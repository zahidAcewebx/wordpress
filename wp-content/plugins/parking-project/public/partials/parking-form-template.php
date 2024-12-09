<div class="form-container">
        <h2>Parking Booking Form</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" required>
            </div>

            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="tel" id="contactNumber" name="contactNumber" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="carRegistration">Car Registration Number</label>
                <input type="text" id="carRegistration" name="carRegistration" required>
            </div>

            <div class="form-group">
                <label for="carMakeModel">Car Make and Model</label>
                <input type="text" id="carMakeModel" name="carMakeModel" required>
            </div>

            <div class="form-group">
                <label for="parkingSpotType">Parking Spot Type (Optional)</label>
                <select id="parkingSpotType" name="parkingSpotType">
                    <option value="regular">Regular</option>
                    <option value="VIP">VIP</option>
                    <option value="disabled">Disabled Parking</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="parkingDuration">Parking Duration</label>
                <input type="text" id="parkingDuration" name="parkingDuration" placeholder="Enter hours/days" required>
            </div>

            <div class="form-group">
                <label for="entryTime">Entry Time</label>
                <input type="datetime-local" id="entryTime" name="entryTime" required>
            </div>

            <div class="form-group">
                <label for="exitTime">Exit Time (if applicable)</label>
                <input type="datetime-local" id="exitTime" name="exitTime">
            </div>

            <div class="form-group">
                <label for="paymentMethod">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod">
                    <option value="online">Online</option>
                    <option value="cash">Cash</option>
                    <option value="card">Card</option>
                </select>
            </div>

            <div class="form-group">
                <label for="specialRequests">Special Instructions/Requests (Optional)</label>
                <textarea id="specialRequests" name="specialRequests" rows="4"></textarea>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" id="agreement" name="agreement" required>
                <label for="agreement">I agree to the Terms and Conditions</label>
            </div>

          
            <div class="form-group">
                <label for="parkingSlotNumber">Parking Slot Number (if assigned)</label>
                <input type="text" id="parkingSlotNumber" name="parkingSlotNumber">
            </div>

            <div class="form-group">
                <button type="submit" class="button">Submit</button>
            </div>
        </form>
    </div>