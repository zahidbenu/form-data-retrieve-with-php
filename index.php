<?php

// Form data retrieve ======================================================================-->
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : '';
    $lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $subscribe = isset($_POST['subscribe']) ? 'Yes' : 'No';
    $multiCheckbox = isset($_POST['multiCheckbox']) ? ($_POST['multiCheckbox']) : ['No'];
    $datePicker = isset($_POST['datePicker']) ? htmlspecialchars($_POST['datePicker']) : '';
    $timePicker = isset($_POST['timePicker']) ? htmlspecialchars($_POST['timePicker']) : '';
    $multiOption = isset($_POST['multiOption']) ? ($_POST['multiOption']) : [];
    $country = isset($_POST['country']) ? htmlspecialchars($_POST['country']) : '';


    echo '<div class="max-w-md mx-auto mb-6"><ul>';
    
    echo '<li><strong>First Name:</strong> '. $firstName .'</li>';
    echo '<li><strong>Last Name:</strong> '. $lastName .'</li>';
    echo '<li><strong>Email:</strong> '. $email .'</li>';
    echo '<li><strong>Gender:</strong> '. $gender .'</li>';
    echo '<li><strong>Subscribe Us:</strong> '. $subscribe .'</li>';
    echo '<li><strong>Join Our Group:</strong> '. implode(', ', $multiCheckbox) .'</li>';
    echo '<li><strong>Confirm Date:</strong> '. $datePicker .'</li>';
    echo '<li><strong>Confirm Time:</strong> '. $timePicker .'</li>';
    echo '<li><strong>Enroll in Course:</strong> '. implode(', ', $multiOption) .'</li>';
    echo '<li><strong>Country:</strong> '. $country .'</li>';

    echo '</ul></div>';

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.0/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.0/dist/js/tom-select.complete.min.js"></script>
    <title>Form Data Retrieve With PHP</title>

    <!-- Custom style for Tom Select 
        =======================================================================================-->
    <style>

        .ts-dropdown, .ts-control {
            border: none;
            outline: black;
            padding: 1px;
        }
        .ts-dropdown, .ts-control input{
            font-size: 100%;
            color: inherit;
        }

    </style>
</head>
<body class="bg-gray-200 p-6">

    <!-- Form area start
        =======================================================================================-->
    <div class="w-1/3 mx-auto bg-white p-8 border rounded shadow">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Hey, Here Your Form!</h2>

        <form action="#" method="POST">
            <!-- Text input as first name  -->
            <div class="mb-4">
                <label for="firstName" class="block text-sm font-medium text-gray-500">First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo isset($firstName) ? $firstName : '' ?>" class="mt-1 p-2 w-full border rounded focus:outline-none">
            </div>

            <!-- Text input as last name  -->
            <div class="mb-4">
                <label for="lastName" class="block text-sm font-medium text-gray-500">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="<?php echo isset($lastName) ? $lastName : '' ?>" class="mt-1 p-2 w-full border rounded focus:outline-none">
            </div>

            <!-- Email input as email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-500">Email</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : '' ?>" class="mt-1 p-2 w-full border rounded focus:outline-none">
            </div>

            <!-- Radio buttons for gender -->
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-500">Gender</label>
                <div class="mt-1 space-x-4">
                    <label for="" class="inline-flex items-center">
                        <input type="radio" name="gender" value="male" class="form-radio text-indigo-500" <?php echo isset($gender) && $gender == 'male' ? 'checked' : ''?>>
                        <span class="ml-2 ">Male</span>
                    </label>
                    <label for="" class="inline-flex items-center">
                        <input type="radio" name="gender" value="female" class="form-radio text-indigo-500" <?php echo isset($gender) && $gender == 'female' ? 'checked' : ''?>>
                        <span class="ml-2 ">Female</span>
                    </label>
                </div>
            </div>

            <!-- Checkbox for subscribe -->
            <div class="mb-4">
                <label for="subscribe" class="block text-sm font-medium text-gray-500">Subscribe Us</label>
                <input type="checkbox" name="subscribe" id="subscribe" class="form-checkbox text-indigo-500" <?php echo isset($subscribe) && $subscribe ? 'checked' : '' ?>>
            </div>

            <!-- Multi-checkbox for group -->
            <div class="mb-4">
                <label for="group" class="block text-sm font-medium text-gray-500">Join Our Group</label>
                <div class="mt-1 space-x-4">
                    <label for="" class="inline-flex items-center">
                        <input type="checkbox" name="multiCheckbox[]" value="java" class="form-checkbox text-indigo-500" <?php echo isset($multiCheckbox) && in_array('java', $multiCheckbox) ? 'checked' : ''?>>
                        <span class="ml-2">Team java</span>
                    </label>
                    <label for="" class="inline-flex items-center">
                        <input type="checkbox" name="multiCheckbox[]" value="php" class="form-checkbox text-indigo-500" <?php echo isset($multiCheckbox) && in_array('php', $multiCheckbox) ? 'checked' : ''?>>
                        <span class="ml-2">Team php</span>
                    </label>
                    <label for="" class="inline-flex items-center">
                        <input type="checkbox" name="multiCheckbox[]" value="python" class="form-checkbox text-indigo-500" <?php echo isset($multiCheckbox) && in_array('python', $multiCheckbox) ? 'checked' : ''?>>
                        <span class="ml-2">Team python</span>
                    </label>
                </div>
            </div>

            <!-- Text input for date picker -->
            <div class="mb-4">
                <label for="datePicker" class="block text-sm font-medium text-gray-500">Confirm Date</label>
                <input type="text" id="datePicker" name="datePicker" value="<?php echo isset($datePicker) ? $datePicker: '' ?>" class="mt-1 p-2 w-full border rounded focus:outline-none">
            </div>

            <!-- Text input for time picker -->
            <div class="mb-4">
                <label for="timePicker" class="block text-sm font-medium text-gray-500">Confirm Time</label>
                <input type="text" id="timePicker" name="timePicker" value="<?php echo isset($timePicker) ? $timePicker : '' ?>" class="mt-1 p-2 w-full border rounded focus:outline-none">
            </div>

            <!-- Multi-select dropdown using Tom Select -->
            <div class="mb-4">
                <label for="multiOption" class="block text-sm font-medium text-gray-500">Enroll in Course</label>
                <select name="multiOption[]" id="multiOption" class="mt-1 p-2 w-full border rounded" multiple>
                    <option value="html" <?php echo isset($multiOption) && in_array('html', $multiOption) ? 'selected' : '' ?>>Html</option>
                    <option value="css" <?php echo isset($multiOption) && in_array('css', $multiOption) ? 'selected' : '' ?>>Css</option>
                    <option value="java" <?php echo isset($multiOption) && in_array('java', $multiOption) ? 'selected' : '' ?>>Java</option>
                    <option value="php" <?php echo isset($multiOption) && in_array('php', $multiOption) ? 'selected' : '' ?>>Php</option>
                    <option value="python" <?php echo isset($multiOption) && in_array('python', $multiOption) ? 'selected' : '' ?>>Python</option>
                </select>
            </div>

            <!-- Single select dropdown using Tom Select -->
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-500">Country</label>
                <select name="country" id="country" class="mt-1 p-2 w-full border rounded focus:outline-none">
                    <option value="usa" <?php echo isset($country) && $country === 'usa' ? 'selected' : '' ?>>United States</option>
                    <option value="uk" <?php echo isset($country) && $country === 'uk' ? 'selected' : '' ?>>United Kingdom</option>
                    <option value="australia" <?php echo isset($country) && $country === 'australia' ? 'selected' : '' ?>>Australia</option>
                    <option value="canada" <?php echo isset($country) && $country === 'canada' ? 'selected' : '' ?>>Canada</option>
                    <option value="bangladesh" <?php echo isset($country) && $country === 'bangladesh' ? 'selected' : '' ?>>Bangladesh</option>
                </select>
            </div>

            <!-- Submit button -->
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white uppercase py-2 px-8 rounded hover:bg-white hover:text-blue-500 hover:border-blue-500 border">Submit</button>
            </div>
        </form>
    </div>
    <!-- Form area end
        =======================================================================================-->
    
    
    <script>

       // Initialize Flatpickr for the date and time
       flatpickr("#datePicker", {
            dateFormat: "Y-m-d"
        });

        flatpickr("#timePicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i"
        });

        // Initialize Tom select for multi-option
        var select = new TomSelect('#multiOption');
       
    </script>
</body>
</html>
