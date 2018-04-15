<?php
/**
 * Class CoursePress_Step_Written
 *
 * @since 3.0
 * @package CoursePress
 */
class CoursePress_Step_Written extends CoursePress_Step {
	protected $type = 'written';

	protected function  get_keys() {
		$keys = parent::get_keys();
		array_push( $keys, 'questions', 'placeholder_text', 'options' );

		return $keys;
	}

	public function setUpStepMeta() {
		parent::setUpStepMeta(); // TODO: Change the autogenerated stub

		$this->__set( 'module_type', 'input-written' );
	}

	public function validate_response( $response = array() ) {
		if ( ! empty( $response ) ) {
			$is_assessable = $this->__get( 'assessable' );
			$min_grade = $this->__get( 'minimum_grade' );

			$user    = coursepress_get_user();
			$data    = array(
				'response' => $response,
				'grade'    => 0,
			);
			if ( ! $is_assessable ) {
				$data['grade'] = $min_grade;
			} else {
				$data['assessable'] = true;
			}
			$step_id           = $this->__get( 'ID' );
			$user              = coursepress_get_user();
			$previous_response = $this->get_user_response( $user->ID );
			$questions         = $this->__get( 'questions' );

			foreach ( $response as $course_id => $response2 ) {
				foreach ( $response2 as $unit_id => $response3 ) {
					$unit_previous_response = ! empty( $previous_response[ $course_id ][ $unit_id ] ) ? $previous_response[ $course_id ][ $unit_id ] : array();
					foreach ( $response3[ $step_id ] as $index => $ans ) {
						if ( $this->is_required() && empty( $ans ) && empty( $unit_previous_response[ $step_id ][ $index ] ) ) {
							// Redirect back.
							$referer = filter_input( INPUT_POST, 'referer_url' );
							$error   = __( 'Response is required for all fields.', 'cp' );
							coursepress_set_cookie( 'cp_step_error', $error, time() + 120 );
							wp_safe_redirect( $referer );
							exit;
						}
						// If answer is empty then add previous answer.
						if ( empty( $ans ) && ! empty( $unit_previous_response[ $step_id ][ $index ] ) ) {
							$data['response'][ $course_id ][ $unit_id ][ $step_id ][ $index ] = $unit_previous_response[ $step_id ][ $index ];
						}

						$word_count = str_word_count( $ans );
						$question   = $questions[ $index ];
						if ( ! empty( $ans ) && ! empty( $question['word_limit'] ) && $word_count > $question['word_limit'] ) {
							$question_value = ( $question['question'] ) ? $question['question'] : $question['title'];
							// Redirect back.
							$referer = filter_input( INPUT_POST, 'referer_url' );
							$error   = sprintf( __( 'Word limit for question no. %1$d is %2$d.', 'cp' ), $index + 1, $question['word_limit'] );
							coursepress_set_cookie( 'cp_step_error', $error, time() + 120 );
							wp_safe_redirect( $referer );
							exit;
						}
					}
					$user->record_response( $course_id, $unit_id, $step_id, $data );
				}
			}
		}
	}

	public function get_question() {
		$templates = '';
		$unit = $this->get_unit();
		$course_id = $unit->__get( 'course_id' );
		$unit_id = $unit->__get( 'ID' );
		$step_id = $this->__get( 'ID' );
		$questions = $this->__get( 'questions' );

		if ( ! empty( $questions ) ) {
			foreach ( $questions as $index => $question ) {
				$template = '';

				if ( ! empty( $question['question'] ) ) {
					$txt_question = wpautop( $question['question'] );
					$template .= $this->create_html( 'div', array( 'class' => 'question' ), $txt_question );
				}

				$name = sprintf( 'module[%d][%d][%d][%d]', $course_id, $unit_id, $step_id, $index );
				$attr = array(
					'name' => $name,
					'class' => 'course-step-written',
					'data-limit' => (int) $question['word_limit'],
					'placeholder' => esc_attr( $question['placeholder_text'] ),
				);
				if ( $this->is_preview() ) {
					$attr['readonly'] = 'readonly';
					$attr['disabled'] = 'disabled';
				}
				$template .= $this->create_html( 'textarea', $attr );
				$templates .= $this->create_html( 'div', array(), $template );
			}
		}

		return $templates;
	}
}
