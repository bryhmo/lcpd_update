





    <style>


header {
    background-color: #eae7e7;
    color: white;
    padding: 20px 0;
    position: sticky;
    top: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
}






.container {
    width: 90%;
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    box-shadow: 0px 0px 10px 0px #000;
    margin-top: 50px;
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
}

form fieldset {
    border: 1px solid #ccc;
    margin-bottom: 20px;
    padding: 10px;
}

form legend {
    font-weight: bold;
    padding: 0 10px;
}

label {
    display: block;
    margin-top: 10px;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button {
    padding: 10px;
    background-color: #ff0808;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #f56666;
}

button.next, button.previous {
    display: inline-block;
    width: 48%;
    margin-top: 10px;
}

button.previous {
    background-color: #ea6f11;
}

button.previous:hover {
    background-color: #732e2e;
}

.form-section {
    display: none;
}

.form-section.active {
    display: block;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 95%;
        margin: auto;
    }

    button.next, button.previous {
        width: 100%;
        margin-top: 10px;
    }

    header {
        flex-direction: column;
        align-items: flex-start;
    }

    nav {
        margin-left: 0;
    }

    nav ul {
        flex-direction: column;
        align-items: flex-start;
    }


}

    </style>

    <div class="container">
        <h2>Master's Degree Registration Form</h2>
        <form id="registrationForm" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            <!-- Personal Information -->
            @csrf
            <div class="form-section" id="section1">
                <fieldset>
                    <legend>Personal Information</legend>
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required>

                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" required>

                    <button type="button" class="next">Next</button>
                </fieldset>
            </div>

            <!-- Contact Information -->
            <div class="form-section" id="section2">
                <fieldset>
                    <legend>Contact Information</legend>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>

                    <legend>Next of Kin Information</legend>
                    <label for="kinName">Next of Kin Name:</label>
                    <input type="text" id="kinName" name="kinName" required>

                    <label for="kinRelationship">Relationship:</label>
                    <input type="text" id="kinRelationship" name="kinRelationship" required>

                    <label for="kinPhone">Next of Kin Phone Number:</label>
                    <input type="tel" id="kinPhone" name="kinPhone" required>

                    <label for="kinAddress">Next of Kin Address:</label>
                    <textarea id="kinAddress" name="kinAddress" required></textarea>

                    <button type="button" class="previous">Previous</button>
                    <button type="button" class="next">Next</button>
                </fieldset>
            </div>

            <!-- Academic Background -->
            <div class="form-section" id="section3">
                <fieldset>
                    <legend>Academic Background</legend>
                    <label for="undergradDegree">Undergraduate Degree:</label>
                    <input type="text" id="undergradDegree" name="undergradDegree" required>

                    <label for="university">University/College:</label>
                    <input type="text" id="university" name="university" required>

                    <label for="gradYear">Year of Graduation:</label>
                    <input type="number" id="gradYear" name="gradYear" min="1900" max="2100" step="1" required>

                    <label for="gpa">GPA:</label>
                    <input type="number" step="0.01" min="0.5" max="7.0" value="0.5" id="gpa" name="gpa" required>

                    <label for="experience">Work Experience (if any):</label>
                    <textarea id="experience" name="experience"></textarea>

                    <label for="certificate">Upload Certificate:</label>
                    <input type="file" id="certificate" name="certificate" required>

                    <button type="button" class="previous">Previous</button>
                    <button type="button" class="next">Next</button>
                </fieldset>
            </div>

            <!-- Program Selection -->
            <div class="form-section" id="section4">
                <fieldset>
                    <legend>Program Selection</legend>
                    <label for="program">Select Program:</label>
                    <select id="program" name="program" required>
                        <option value="">Select</option>
                        <option value="computerScience">Computer Science</option>
                        <option value="businessAdministration">Business Administration</option>
                        <option value="engineering">Engineering</option>
                        <!-- Add more options as needed -->
                    </select>

                    <label for="intake">Preferred Intake:</label>
                    <select id="intake" name="intake" required>
                        <option value="">Select</option>
                        <option value="march">March</option>
                        <option value="july">July</option>
                        <option value="september">September</option>
                    </select>

                    <label for="statement">Statement of Purpose:</label>
                    <textarea id="statement" name="statement" required></textarea>

                    <button type="button" class="previous">Previous</button>
                    <button type="submit">Register</button>
                </fieldset>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    let currentSectionIndex = 0;
    const sections = document.querySelectorAll('.form-section');
    sections[currentSectionIndex].classList.add('active');

    document.querySelectorAll('button.next').forEach(button => {
        button.addEventListener('click', () => {
            if (validateSection(sections[currentSectionIndex])) {
                sections[currentSectionIndex].classList.remove('active');
                currentSectionIndex++;
                sections[currentSectionIndex].classList.add('active');
            }
        });
    });

    document.querySelectorAll('button.previous').forEach(button => {
        button.addEventListener('click', () => {
            sections[currentSectionIndex].classList.remove('active');
            currentSectionIndex--;
            sections[currentSectionIndex].classList.add('active');
        });
    });

    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        if (!validateSection(sections[currentSectionIndex])) {
            event.preventDefault();
        } else {
            alert('Registration successful!');
        }
    });

    function validateSection(section) {
        let isValid = true;
        section.querySelectorAll('input, select, textarea').forEach(input => {
            if (!input.checkValidity()) {
                isValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '';
            }
        });
        return isValid;
    }
});

    </script>


