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
		add_shortcode( 'user_login', array( $this, 'user_login_func') );
		add_shortcode( 'parking_form', array( $this, 'parking_form_func') );
		add_shortcode( 'get_parking', array( $this, 'get_parking_func') );


		

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
		wp_enqueue_style('parking-form-style', plugin_dir_url(__FILE__) . 'css/parking-form-style.css');
		wp_enqueue_style('parking-card-style', plugin_dir_url(__FILE__) . 'css/parking-card-style.css');


	
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
			$role   = $_POST['role'];
	
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
					'role'        =>$role,
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
	
	
	


// public function get_user_data_by_id() {

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

    // // Start the output string
    $output = '<style>
                
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
		// $password   = $user_info->user_pass;
		
		
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
		// $output .= "<p><strong>password:</strong> $password</p>";

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

public function user_login_func() {
    // Initialize the error message variable
    $error_message = '';

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
        // Sanitize the email and password input
        $email = sanitize_email($_POST['email']);
        $password = sanitize_text_field($_POST['password']);
        
        // Attempt user authentication
        $user = wp_authenticate_email_password(null, $email, $password);

            echo '<script type="text/javascript">
        window.location.href = "' . home_url('/get-parking') . '";
    </script>';

    // End the function
    return;
    }

    // Output buffering to include the login form template
    ob_start();
    include(plugin_dir_path(__FILE__) . 'partials/login-form-template.php');
    $html = ob_get_clean(); // Get the buffered content without flushing

    // Pass the error message and render the login form
    return str_replace('{{error_message}}', esc_html($error_message), $html);
}


// public function user_login_func() {
//     // Initialize the error message variable
// 	   // If no redirect occurred, render the login form
// 	   ob_start();  // Start output buffering

// 	   // You can include the login form template here, and also display any error messages
// 	   include(plugin_dir_path(__FILE__) . 'partials/login-form-template.php'); 
	   
// 	   // Get the buffered content and return it
// 	   $html = ob_end_flush();
//     $error_message = '';

//     // Check if the form is submitted
//     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_submit'])) {
//         // Sanitize the email and password input
//         $email = sanitize_email($_POST['email']);
//         $password = sanitize_text_field($_POST['password']);
        
//         // Attempt user authentication
//         $user = wp_authenticate_email_password(null, $email, $password);

       
//         // If authentication is successful, redirect to home page
//         if (!is_wp_error($user)) {
			
// 			wp_redirect('http://localhost/zahid-tutor/register'); // Directly redirect to the post
//             exit();
// // Exit immediately after redirect to ensure no further code is executed
//         } else {
//             // If authentication fails, display the error message
//             $error_message = $user->get_error_message();
//         }
//     }

 

//     return $html; 
// }

public function parking_form_func() {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fullName'])) {
        // Sanitize and validate input
        $full_name = sanitize_text_field($_POST['fullName']);
        $contact_number = sanitize_text_field($_POST['contactNumber']);
        $email = sanitize_email($_POST['email']);
        $car_registration = sanitize_text_field($_POST['carRegistration']);
        $car_make_model = sanitize_text_field($_POST['carMakeModel']);
        $parking_spot_type = sanitize_text_field($_POST['parkingSpotType']);
        $parking_duration = sanitize_text_field($_POST['parkingDuration']);
        $entry_time = sanitize_text_field($_POST['entryTime']);
        $exit_time = sanitize_text_field($_POST['exitTime']);
        $payment_method = sanitize_text_field($_POST['paymentMethod']);
        $special_requests = sanitize_textarea_field($_POST['specialRequests']);
        $agreement = isset($_POST['agreement']) ? 1 : 0; // Checkbox value
        $parking_slot_number = sanitize_text_field($_POST['parkingSlotNumber']);

        global $wpdb;
        $table_name = $wpdb->prefix . 'parking_bookings';

        // Insert the form data into the database
        $wpdb->insert(
            $table_name,
            array(
                'full_name' => $full_name,
                'contact_number' => $contact_number,
                'email' => $email,
                'car_registration' => $car_registration,
                'car_make_model' => $car_make_model,
                'parking_spot_type' => $parking_spot_type,
                'parking_duration' => $parking_duration,
                'entry_time' => $entry_time,
                'exit_time' => $exit_time,
                'payment_method' => $payment_method,
                'special_requests' => $special_requests,
                'agreement' => $agreement,
                'parking_slot_number' => $parking_slot_number,
            )
        );
            echo '<script type="text/javascript">
        window.location.href = "' . home_url('/get-parking') . '";
    </script>';

    // End the function
    return;
        // Optionally, you can redirect or show a confirmation message
        echo '<p>Thank you for your booking!</p>';
    }

    // Include the registration form template
    include(plugin_dir_path(__FILE__) . 'partials/parking-form-template.php'); // Correct path

    $html = ob_get_clean();

    return $html;
}
public function get_parking_func() {
    global $wpdb;

    // Define the table name with the correct WordPress prefix
    $table_name = $wpdb->prefix . 'parking_bookings';

    // Query the database to get all parking bookings
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    // Check if there are any results
    if (!empty($results)) {
        // Include the HTML template
        include plugin_dir_path(__FILE__) . 'partials/parking-card-template.php';
    } else {
        return '<p>No parking bookings found.</p>';
    }
}


}

