<?php $page = $_GET['page']; ?>

<div id="poststuff" class="metabox-holder m-settings cp-wrap">
    <form action='' method='post'>

        <input type='hidden' name='page' value='<?php echo esc_attr($page); ?>' />
        <input type='hidden' name='action' value='updateoptions' />

        <?php
        wp_nonce_field('update-coursepress-options');
        ?>
        <div class="postbox">
            <h3 class="hndle" style='cursor:auto;'><span><?php _e('Slugs', 'cp'); ?></span></h3>
            <div class="inside">
                <p class='description'><?php _e('A slug is a few words that describe a post or a page. Slugs are usually a URL friendly version of the post title ( which has been automatically generated by WordPress ), but a slug can be anything you like. Slugs are meant to be used with <a href="options-permalink.php">permalinks</a> as they help describe what the content at the URL is. Post slug substitutes the <strong>"%posttitle%"</strong> placeholder in a custom permalink structure.', 'cp'); ?></p>
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row"><?php _e('Course Slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url()));
                                ?>&nbsp;<input type='text' name='option_coursepress_course_slug' id='course_slug' value='<?php echo esc_attr($this->get_course_slug());
                                ?>' />&nbsp;/

                                <p class='description'><?php _e('Your course URL will look like: ', 'cp'); ?><?php echo esc_html(trailingslashit(home_url())); ?><?php echo esc_attr($this->get_course_slug()); ?><?php _e('/my-course/', 'cp'); ?></p>

                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Units Slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url() . __('/my-course/', 'cp')));
                                ?>&nbsp;<input type='text' name='option_coursepress_units_slug' id='units_slug' value='<?php echo esc_attr($this->get_units_slug());
                                ?>' />&nbsp;/

                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Course Notifications Slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url() . __('/my-course/', 'cp')));
                                ?>&nbsp;<input type='text' name='option_coursepress_notifications_slug' id='notifications_slug' value='<?php echo esc_attr($this->get_notifications_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Course Discussions Slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url() . __('/my-course/', 'cp')));
                                ?>&nbsp;<input type='text' name='option_coursepress_discussion_slug' id='discussion_slug' value='<?php echo esc_attr($this->get_discussion_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Course New Discussions Slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url() . __('/my-course/', 'cp')));
                                echo '' . $this->get_discussion_slug() . '/';
                                ?>&nbsp;<input type='text' name='option_coursepress_discussion_slug_new' id='discussion_slug_new' value='<?php echo esc_attr($this->get_discussion_slug_new());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Course Grades Slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url() . __('/my-course/', 'cp')));
                                ?>&nbsp;<input type='text' name='option_coursepress_grades_slug' id='grades_slug' value='<?php echo esc_attr($this->get_grades_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Course Workbook Slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url() . __('/my-course/', 'cp')));
                                ?>&nbsp;<input type='text' name='option_coursepress_workbook_slug' id='workbook_slug' value='<?php echo esc_attr($this->get_workbook_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Enrollment Process page', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url()));
                                ?>&nbsp;<input type='text' name='option_enrollment_process_slug' id='enrollment_process_slug' value='<?php echo esc_attr($this->get_enrollment_process_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Login page', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url()));
                                ?>&nbsp;<input type='text' name='option_login_slug' id='login_slug' value='<?php echo esc_attr($this->get_login_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Sign Up page', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url()));
                                ?>&nbsp;<input type='text' name='option_signup_slug' id='signup_slug' value='<?php echo esc_attr($this->get_signup_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Student Dashboard page', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url()));
                                ?>&nbsp;<input type='text' name='option_student_dashboard_slug' id='student_dashboard_slug' value='<?php echo esc_attr($this->get_student_dashboard_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Student Settings page', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url()));
                                ?>&nbsp;<input type='text' name='option_student_settings_slug' id='student_dashboard_slug' value='<?php echo esc_attr($this->get_student_settings_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Instructor profile slug', 'cp'); ?></th>
                            <td>
                                <?php
                                echo esc_html(trailingslashit(home_url()));
                                ?>&nbsp;<input type='text' name='option_instructor_profile_slug' id='instructor_profile_slug' value='<?php echo esc_attr($this->get_instructor_profile_slug());
                                ?>' />&nbsp;/
                            </td>
                        </tr>                        

                    </tbody>
                </table>
            </div>
        </div>

        <div class="postbox">
            <h3 class="hndle" style='cursor:auto;'><span><?php _e('Theme Menu Items', 'cp'); ?></span></h3>
            <div class="inside">
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row"><?php _e('Display menu items', 'cp'); ?></th>
                            <td>
                                <a class="help-icon" href="javascript:;"></a>
                                <div class="tooltip">
                                    <div class="tooltip-before"></div>
                                    <div class="tooltip-button">&times;</div>
                                    <div class="tooltip-content">
                                        <?php _e('<div>Attach default CoursePress menu items ( Courses, Student Dashboard, Log Out ) to the <strong>Primary Menu</strong>.</div><div>Items can also be added from Appearance > Menus and the CoursePress panel.</div>', 'cp') ?>
                                    </div>
                                </div>
                                <input type='checkbox' name='display_menu_items' <?php echo ( ( get_option('display_menu_items', 1) ) ? 'checked' : '' ); ?> />
                                <?php
                                if ( current_user_can('manage_options') ) {
                                    $menu_error = true;
                                    $locations = get_theme_mod('nav_menu_locations');
                                    if ( is_array($locations) ) {
                                        foreach ( $locations as $location => $value ) {
                                            if ( $value > 0 ) {
                                                $menu_error = false; //at least one is defined
                                            }
                                        }
                                    }
                                    //$menu_locations = get_nav_menu_locations();
                                    ?>
                                    <span class="add_class_message">
                                        <?php
                                        if ( $menu_error ) {
                                            _e('Please add at least one menu and select its theme location in order to show CoursePress menu items automatically.', 'cp');
                                        }
                                        ?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="postbox">
            <h3 class="hndle" style='cursor:auto;'><span><?php _e('Login Form', 'cp'); ?></span></h3>
            <div class="inside">
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row"><?php _e('Use Custom Login Form', 'cp'); ?></th>
                            <td>
                                <a class="help-icon" href="javascript:;"></a>
                                <div class="tooltip">
                                    <div class="tooltip-before"></div>
                                    <div class="tooltip-button">&times;</div>
                                    <div class="tooltip-content">
                                        <?php _e('Uses a custom Login Form to keep students on the front-end of your site.', 'cp') ?>
                                    </div>
                                </div>
                                <input type='checkbox' name='use_custom_login_form' <?php echo ( ( get_option('use_custom_login_form', 1) ) ? 'checked' : '' ); ?> />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="postbox">
            <h3 class="hndle" style='cursor:auto;'><span><?php _e('Course Details Page', 'cp'); ?></span></h3>
            <div class="inside">
                <p class='description'><?php _e('Media to use when viewing course details', 'cp'); ?></p>
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row"><?php _e('Media Type', 'cp'); ?>
                                <?php CP_Helper_Tooltip::tooltip(__('"Priority" - Use the media type below, with the other type as a fallback.', 'cp')); ?></th>
                            <td>
                                <?php $selected_type = get_option('details_media_type', 'default'); ?>
                                <select name="option_details_media_type" class="widefat" id="option_details_media_type">
                                    <option value="default" <?php selected($selected_type, 'default', true); ?>><?php _e('Priority Mode (default)', 'cp'); ?></option>
                                    <option value="video" <?php selected($selected_type, 'video', true); ?>><?php _e('Featured Video', 'cp'); ?></option>
                                    <option value="image" <?php selected($selected_type, 'image', true); ?>><?php _e('List Image', 'cp'); ?></option>					
                                    <!-- <option value="thumbnail" <?php // selected($selected_type, 'thumbnail', true);  ?>><?php // _e( 'Thumbnail', 'cp' );  ?></option> -->
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e('Priority', 'cp'); ?>
                                <?php CP_Helper_Tooltip::tooltip(__('Example: Using "video", the featured video will be used if available. The listing image is a fallback.', 'cp')); ?></th>
                            <td>
                                <?php $selected_priority = get_option('details_media_priority', 'video'); ?>
                                <select name="option_details_media_priority" class="widefat" id="option_details_media_priority">
                                    <option value="video" <?php selected($selected_priority, 'video', true); ?>><?php _e('Featured Video (image fallback)', 'cp'); ?></option>
                                    <option value="image" <?php selected($selected_priority, 'image', true); ?>><?php _e('List Image (video fallback)', 'cp'); ?></option>					
                                </select>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="postbox">
            <h3 class="hndle" style='cursor:auto;'><span><?php _e('Course Listings', 'cp'); ?></span></h3>
            <div class="inside">
                <p class='description'><?php _e('Media to use when viewing course listings (e.g. Courses page or Instructor page)', 'cp'); ?></p>				
                <table class="form-table">
                    <tbody>

                        <tr valign="top">
                            <th scope="row"><?php _e('Media Type', 'cp'); ?>
                                <?php CP_Helper_Tooltip::tooltip(__('"Priority" - Use the media type below, with the other type as a fallback.', 'cp')); ?></th>
                            <td>
                                <?php $selected_type = get_option('listings_media_type', 'default'); ?>
                                <select name="option_listings_media_type" class="widefat" id="option_listings_media_type">
                                    <option value="default" <?php selected($selected_type, 'default', true); ?>><?php _e('Priority Mode (default)', 'cp'); ?></option>
                                    <option value="video" <?php selected($selected_type, 'video', true); ?>><?php _e('Featured Video', 'cp'); ?></option>
                                    <option value="image" <?php selected($selected_type, 'image', true); ?>><?php _e('List Image', 'cp'); ?></option>					
                                    <!-- <option value="thumbnail" <?php // selected($selected_type, 'thumbnail', true);  ?>><?php // _e( 'Thumbnail', 'cp' );  ?></option> -->
                                </select>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e('Priority', 'cp'); ?>
                                <?php CP_Helper_Tooltip::tooltip(__('Example: Using "video", the featured video will be used if available. The listing image is a fallback.', 'cp')); ?></th>
                            <td>
                                <?php $selected_priority = get_option('listings_media_priority', 'image'); ?>
                                <select name="option_listings_media_priority" class="widefat" id="option_listings_media_priority">
                                    <option value="video" <?php selected($selected_priority, 'video', true); ?>><?php _e('Featured Video (image fallback)', 'cp'); ?></option>
                                    <option value="image" <?php selected($selected_priority, 'image', true); ?>><?php _e('List Image (video fallback)', 'cp'); ?></option>					
                                </select>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="postbox">
            <h3 class="hndle" style='cursor:auto;'><span><?php _e('Course Images', 'cp'); ?></span></h3>
            <div class="inside">
                <p class='description'><?php _e('Size for ( newly uploaded ) course images', 'cp'); ?></p>
                <table class="form-table">
                    <tbody>

                        <tr valign="top">
                            <th scope="row"><?php _e('Image Width', 'cp'); ?></th>
                            <td>
                                <input type='text' name='option_course_image_width' value="<?php echo esc_attr(get_option('course_image_width', 235)); ?>"  />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Image Height', 'cp'); ?></th>
                            <td>
                                <input type='text' name='option_course_image_height' value="<?php echo esc_attr(get_option('course_image_height', 225)); ?>"  />
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <?php
        do_action('coursepress_general_options_page');
        ?>

        <p class="save-shanges">
            <?php submit_button(__('Save Changes', 'cp')); ?>
        </p>

    </form>
</div>