<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://Parking-project
 * @since      1.0.0
 *
 * @package    Parking_Project
 * @subpackage Parking_Project/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Parking_Project
 * @subpackage Parking_Project/public
 * @author     zahid <zahid.acewebx@gmail.com>
 */
class Parking_Project_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode( 'my_register_form', array( $this, 'my_register_form_func') );
		add_shortcode( 'get_user_data', array( $this, 'get_user_data') );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Parking_Project_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Parking_Project_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/parking-project-public.css', array(), $this->version, 'all' );
		wp_enqueue_style('register-form-style', plugin_dir_url(__FILE__) . 'css/register-form-style.css');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Parking_Project_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Parking_Project_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/parking-project-public.js', array( 'jquery' ), $this->version, false );

	}
	

	// public function custom_register_form() {
	// 	// Output custom fields or modify the default registration form here
	// 	echo '<p><label for="custom_field">Custom Fieldghjhjh</label>';
	// 	echo '<input type="text" name="custom_field" id="custom_field" class="input" value="" /></p>';
	// }
	// public function my_register_form_func() {
	// 	// Output custom fields or modify the default registration form here
	// 	$html  = '<style>
	// 				.my-register-form { width: 100%; max-width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9; }
	// 				.my-register-form p { margin-bottom: 15px; }
	// 				.my-register-form label { font-weight: bold; display: block; margin-bottom: 5px; }
	// 				.my-register-form input[type="text"], .my-register-form input[type="email"], .my-register-form input[type="password"] { width: 100%; padding: 10px; margin: 5px 0 15px 0; border: 1px solid #ccc; }
	// 				.my-register-form input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; width: 100%; }
	// 				.my-register-form input[type="submit"]:hover { background-color: #45a049; }
	// 				.error-message { color: red; font-size: 14px; }
	// 				.success-message { color: green; font-size: 14px; }
	// 			  </style>';
	
	// 	$html .= '<form method="post" class="my-register-form">';
	// 	$html .= '<p><label for="username">Username</label>';
	// 	$html .= '<input type="text" name="username" id="username" class="input" required /></p>';
	
	// 	$html .= '<p><label for="first_name">First Name</label>';
	// 	$html .= '<input type="text" name="first_name" id="first_name" class="input" required /></p>';
	
	// 	$html .= '<p><label for="last_name">Last Name</label>';
	// 	$html .= '<input type="text" name="last_name" id="last_name" class="input" required /></p>';
	
	// 	$html .= '<p><label for="email">Email</label>';
	// 	$html .= '<input type="email" name="email" id="email" class="input" required /></p>';
	
	// 	$html .= '<p><label for="password">Password</label>';
	// 	$html .= '<input type="password" name="password" id="password" class="input" required /></p>';
	
	// 	$html .= '<p><label for="phone_number">Phone</label>';
	// 	$html .= '<input type="text" name="phone_number" id="phone_number" class="input" /></p>';
	
	// 	$html .= '<p><label for="address">Address</label>';
	// 	$html .= '<input type="text" name="address" id="address" class="input" /></p>';
	
	// 	$html .= '<p><input type="submit" name="register_submit" value="Register" /></p>';
	
	// 	$html .= '</form>';
	
	// 	if (isset($_POST['register_submit'])) {
	
	// 		$username  = sanitize_text_field($_POST['username']);
	// 		$firstname = sanitize_text_field($_POST['first_name']);
	// 		$lastname  = sanitize_text_field($_POST['last_name']);
	// 		$email     = sanitize_email($_POST['email']);
	// 		$password  = sanitize_text_field($_POST['password']);
	// 		$phonenumber = sanitize_text_field($_POST['phone_number']);
	// 		$address   = sanitize_text_field($_POST['address']);
	
	// 		if (username_exists($username)){
	// 			$html .= '<p class="error-message">Username already exists.</p>';
	// 		} elseif (email_exists($email)){
	// 			$html .= '<p class="error-message">Email already exists.</p>';
	// 		} else {
	// 			$userdata = array(
	// 				'user_login'  => $username,
	// 				'first_name'  => $firstname,
	// 				'last_name'   => $lastname,
	// 				'user_email'  => $email,
	// 				'user_pass'   => $password,
	// 			);
	
	// 			$user_id = wp_insert_user($userdata);
	// 			if (is_wp_error($user_id)) {
	// 				$html .= '<p class="error-message">Error: ' . $user_id->get_error_message() . '</p>';
	// 			} else {
	// 				// User registration successful
	// 				update_user_meta($user_id, 'phone_number', $phonenumber);
	// 				update_user_meta($user_id, 'address', $address);
	// 				$html .= '<p class="success-message">Registration successful! You can now log in.</p>';
	// 			}
	// 		}
	// 	}
	
	// 	return $html;
	// }




	public function my_register_form_func() {
		// Start the output buffer
		ob_start();
	
		// Include the registration form template
		include(plugin_dir_path(__FILE__) . 'partials/register-form-template.php'); // Correct path
	
		$html = ob_get_clean();
	
		// Handle form submission
		if (isset($_POST['register_submit'])) {
			$username  = sanitize_text_field($_POST['username']);
			$firstname = sanitize_text_field($_POST['first_name']);
			$lastname  = sanitize_text_field($_POST['last_name']);
			$email     = sanitize_email($_POST['email']);
			$password  = sanitize_text_field($_POST['password']);
			$phonenumber = sanitize_text_field($_POST['phone_number']);
			$address   = sanitize_text_field($_POST['address']);
	
			if (username_exists($username)) {
				$html .= '<p class="error-message">Username already exists.</p>';
			} elseif (email_exists($email)) {
				$html .= '<p class="error-message">Email already exists.</p>';
			} else {
				$userdata = array(
					'user_login'  => $username,
					'first_name'  => $firstname,
					'last_name'   => $lastname,
					'user_email'  => $email,
					'user_pass'   => $password,
				);
	
				$user_id = wp_insert_user($userdata);
	
				if (is_wp_error($user_id)) {
					$html .= '<p class="error-message">Error: ' . $user_id->get_error_message() . '</p>';
				} else {
					// User registration successful
					update_user_meta($user_id, 'phone_number', $phonenumber);
					update_user_meta($user_id, 'address', $address);
					$html .= '<p class="success-message">Registration successful! You can now log in.</p>';
				}
			}
		}
	
		return $html;
	}
	
	
	


// public function get_user_data() {

//     $user_id = get_current_user_id();

//     if ($user_id === 0) {
//         return 'You must be logged in to view your data.';
//     }

//     $user_info = get_userdata($user_id);

//     $first_name = $user_info->first_name;
//     $last_name  = $user_info->last_name;
//     $email      = $user_info->user_email;
//     $username   = $user_info->user_login;

//     $phone_number = get_user_meta($user_id, 'phone_number', true); 
//     $address      = get_user_meta($user_id, 'address', true);     
    
//     $other_field  = get_user_meta($user_id, 'other_custom_field', true); 

 
//     $output = "<p><strong>Username:</strong> $username</p>";
//     $output .= "<p><strong>First Name:</strong> $first_name</p>";
//     $output .= "<p><strong>Last Name:</strong> $last_name</p>";
//     $output .= "<p><strong>Email:</strong> $email</p>";
    
   
//     if (!empty($phone_number)) {
//         $output .= "<p><strong>Phone Number:</strong> $phone_number</p>";
//     }
//     if (!empty($address)) {
//         $output .= "<p><strong>Address:</strong> $address</p>";
//     }
//     if (!empty($other_field)) {
//         $output .= "<p><strong>Other Custom Field:</strong> $other_field</p>";
//     }

//     return $output;
// }



public function get_user_data() {
    // Get all users
    $users = get_users();

    // Check if there are users
    if (empty($users)) {
        return '<p>No users found.</p>'; // Handle case when no users are found
    }

    // Start the output string
    $output = '<style>
                ul.user-list {
                    list-style-type: none;
                    padding: 0;
                    margin: 0;
                }
                ul.user-list li {
                    border: 1px solid #ddd;
                    margin: 10px 0;
                    padding: 15px;
                    background-color: #f9f9f9;
                }
                ul.user-list li p {
                    margin: 5px 0;
                    font-size: 14px;
                }
                ul.user-list li p strong {
                    color: #333;
                }
                </style>'; // Adding inline CSS for basic styling

    // Opening the list for user data
    $output .= '<ul class="user-list">';

    // Loop through all users
    foreach ($users as $user_info) {
        // Fetch user details
        $first_name = $user_info->first_name;
        $last_name  = $user_info->last_name;
        $email      = $user_info->user_email;
        $username   = $user_info->user_login;

        // Fetch user meta fields using the user ID
        $phone_number = get_user_meta($user_info->ID, 'phone_number', true);
        $address      = get_user_meta($user_info->ID, 'address', true);
        $other_field  = get_user_meta($user_info->ID, 'other_custom_field', true);

        // Start adding user data to the output
        $output .= '<li>';
        $output .= "<p><strong>Username:</strong> $username</p>";
        $output .= "<p><strong>First Name:</strong> $first_name</p>";
        $output .= "<p><strong>Last Name:</strong> $last_name</p>";
        $output .= "<p><strong>Email:</strong> $email</p>";

        // Add phone number if available
        if (!empty($phone_number)) {
            $output .= "<p><strong>Phone Number:</strong> $phone_number</p>";
        }

        // Add address if available
        if (!empty($address)) {
            $output .= "<p><strong>Address:</strong> $address</p>";
        }

        // Add other custom field if available
        if (!empty($other_field)) {
            $output .= "<p><strong>Other Custom Field:</strong> $other_field</p>";
        }

        $output .= '</li>';
    }

    // Close the list
    $output .= '</ul>';

    return $output;
}




}
