<?php
class CoursePress_Helper_Upgrade {
	private static $settings = array();

	public static function update_course( $course_id ) {
		$course = get_post( $course_id );
		$found_error = 0;

		// Update course instructors
		if ( false == self::update_course_instructors( $course_id ) ) {
			$found_error += 1;
		}
		// Update course meta
		if ( false == self::update_course_meta( $course_id ) ) {
			$found_error += 1;
		}

		// Now update the course settings
		if ( false == self::update_course_settings( $course_id, self::$settings ) ) {
			$found_error += 1;
		}
		
		$result = ( 0 == $found_error );
		if ( $result ) update_post_meta($course_id, '_cp_updated_to_version_2', 1);
		
		return $result;
	}

	public static function strtotime( $timestamp ) {
		if ( ! is_numeric( $timestamp ) ) {
			$timestamp = strtotime( $timestamp . ' UTC' ); //@todo: Need hook to change timestamp
		}

		return $timestamp;
	}

	public static function update_course_settings( $course_id, $settings ) {
		$settings = array_filter( $settings );
		update_post_meta( $course_id, 'course_settings', $settings );

		$date_types = array(
			'course_start_date',
			'course_end_date',
			'enrollment_start_date',
			'enrollment_end_date',
		);

		$course_open_ended = ! empty( $settings['course_open_ended'] );
		$enrollment_open_ended = ! empty( $settings['enrollment_open_ended'] );

		foreach ( $settings as $meta_key => $meta_value ) {
			if ( in_array( $meta_key, $date_types ) ) {
				$meta_value = trim( $meta_value );
				$meta_value = ! empty( $meta_value ) ? self::strtotime( $meta_value ) : 0;
				$meta_value = (int) $meta_value;

				if ( ( true === $course_open_ended && 'course_end_date' == $meta_key )
					|| ( true === $enrollment_open_ended && 'enrollment_end_date' == $meta_key )
				   ) {
					$meta_value = 0;
				}
				update_post_meta( $course_id, "cp_{$meta_key}", $meta_value );
			}
		}

		return true;
	}

	private static function update_course_instructors( $course_id ) {
		$instructors = (array) get_post_meta( $course_id, 'instructors', true );
		$instructors = array_filter( $instructors );
		self::$settings['instructors'] = $instructors;

		return true;
	}

	private static function update_course_meta( $course_id ) {
		$course_metas = array(
			'course_view' => 'normal',
			'minimum_grade_required' => 100,
			'pre_completion_title' => __( 'Almost There', 'cp' ),
			'pre_completion_content' => '',
			'course_completion_title' => __( 'Congratulations, you passed!', 'cp' ),
			'course_completion_content' => '',
			'course_failed_title' => __( 'Sorry, you did not pass this course!', 'cp' ),
			'course_failed_content' => '',
			'setup_step_1' => 'saved',
			'setup_step_2' => 'saved',
			'setup_step_3' => 'saved',
			'setup_step_4' => 'saved',
			'setup_step_5' => 'saved',
			'setup_step_6' => 'saved',
			'setup_step_7' => 'saved',
		);
		$meta_keys = array(
			'feature_url' => 'listing_image',
			'course_video_url' => 'featured_video',
			'course_structure_options' => 'structure_visible',
			'course_structure_time_display' => 'structure_show_duration',
			'course_language' => 'course_language',
			/** Course Dates **/
			'open_ended_course' => 'course_open_ended',
			'course_start_date' => 'course_start_date',
			'course_end_date' => 'course_end_date',
			'open_ended_enrollment' => 'enrollment_open_ended',
			'enrollment_start_date' => 'enrollment_start_date',
			'enrollment_end_date' => 'enrollment_end_date',
			/** Classes, Discussions **/
			'limit_class_size' => 'class_limited',
			'class_size' => 'class_size',
			'allow_course_discussion' => 'allow_discussion',
			'allow_workbook_page' => 'allow_workbook',
			/** Enrollment & Cost **/
			'enroll_type' => 'enrollment_type',
			'paid_course' => 'payment_paid_course',
		);

		foreach ( $meta_keys as $old_meta => $new_meta ) {
			$meta_value = get_post_meta( $course_id, $old_meta, true );

			if ( 'enroll_type' == $old_meta ) {
				// Fix enrollment type
				if ( 'registered' == $meta_value ) {
					$meta_value = 'anyone';
				}
			}

			$course_metas[ $new_meta ] = $meta_value;
		}

		self::$settings = wp_parse_args( self::$settings, $course_metas );

		return true;
	}
}
