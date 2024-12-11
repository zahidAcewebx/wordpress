<div class="cards-container">
    <?php foreach ($results as $booking): ?>
        <div class="card">
            <h3><?php echo esc_html($booking->full_name); ?></h3>
            <p><strong>Contact:</strong> <?php echo esc_html($booking->contact_number); ?></p>
            <p><strong>Email:</strong> <?php echo esc_html($booking->email); ?></p>
            <p><strong>Car Registration:</strong> <?php echo esc_html($booking->car_registration); ?></p>
            <p><strong>Car Make & Model:</strong> <?php echo esc_html($booking->car_make_model); ?></p>
            <p><strong>Parking Spot Type:</strong> <?php echo esc_html($booking->parking_spot_type); ?></p>
            <p><strong>Parking Duration:</strong> <?php echo esc_html($booking->parking_duration); ?></p>
            <p><strong>Entry Time:</strong> <?php echo esc_html($booking->entry_time); ?></p>
            <p><strong>Exit Time:</strong> <?php echo esc_html($booking->exit_time); ?></p>
            <p><strong>Payment Method:</strong> <?php echo esc_html($booking->payment_method); ?></p>
            <p><strong>Special Requests:</strong> <?php echo esc_html($booking->special_requests); ?></p>
            <p><strong>Agreement:</strong> <?php echo esc_html($booking->agreement); ?></p>
            <p><strong>Parking Slot Number:</strong> <?php echo esc_html($booking->parking_slot_number); ?></p>
        </div>
    <?php endforeach; ?>
</div>
