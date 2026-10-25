<?php
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>La Biblioteca – SignUp</title>
        <meta name="description" content="Sign up and register for a La Biblioteca account to purchase books">
        <meta name="keywords" content="register, library, email, password, phone number, La Biblioteca">
        <link rel="stylesheet" href="cssfile.css">
    </head>

<script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>

<body>
    <h1>La Biblioteca</h1>
<!-- display navbar -->
    <div class="navbar">
        <a href="DBConnect.php">Home</a>
        <div class="subnav">
            <button class="subnavbtn">Types ▾</button>
            <div class="subnav-content">
                <div class="flyout">
                    <a href="#">Kids ▸</a>
                    <div class="flyout-content">
                        <a href="infants.php">Infant</a>
                        <a href="juniors.php">Junior</a>
                        <a href="young.php">Young</a>
                    </div>
                </div>
                <div class="flyout">
                    <a href="#">Adults ▸</a>
                    <div class="flyout-content">
                        <a href="classic.php">Classic Novels</a>
                        <a href="fiction.php">Fiction</a>
                        <a href="comic.php">Comic</a>
                        <a href="crime.php">Crime &amp; Thriller</a>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['loggedin'])): ?> <!-- check whether the user is logged in -->
                <a href="logout.php" class="split">Logout</a>
            <?php else: ?>
                <a href="signup.php" class="split">Register</a>
                <a href="session.php" class="split">Log-In</a>
            <?php endif; ?>
    </div>
    <p class="section-title">Create an Account</p>

    <div id="root"></div>

<script type="text/babel">

// creat registration rules and live validation
class RegisterForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            name: '',
            phone: '',
            email: '',
            password: '',
            confirmPassword: '',
            nameError: '',
            phoneError: '',
            emailError: '',
            passwordError: '',
            confirmError: ''
        };

        this.handleName = this.handleName.bind(this);
        this.handlePhone = this.handlePhone.bind(this);
        this.handleEmail = this.handleEmail.bind(this);
        this.handlePassword = this.handlePassword.bind(this);
        this.handleConfirm = this.handleConfirm.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    // Full name — letters only
    handleName(event) {
        const newValue = event.target.value;
        let error = "";

        if (!newValue) {
            error = "Name is required.";
        } else if (!/^[a-zA-Z\s]+$/.test(newValue)) {
            error = "Name must contain letters only.";
        }

        this.setState({ name: newValue, nameError: error });
    }

    // Phone — exactly 10 digits
    handlePhone(event) {
        const newValue = event.target.value;
        let error = "";

        if (!newValue) {
            error = "Phone number is required.";
        } else if (!/^\d{10}$/.test(newValue)) {
            error = "Phone must be exactly 10 digits.";
        }

        this.setState({ phone: newValue, phoneError: error });
    }

    // Email — valid format
    handleEmail(event) {
        const newValue = event.target.value;
        let error = "";

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!newValue) {
            error = "Email is required.";
        } else if (!emailRegex.test(newValue)) {
            error = "Invalid email format (e.g. abc@xyz.com).";
        }

        this.setState({ email: newValue, emailError: error });
    }

    // Password — at least 6 characters
    handlePassword(event) {
        const newValue = event.target.value;
        let error = "";

        if (!newValue) {
            error = "Password is required.";
        } else if (newValue.length < 6) {
            error = "Password must be at least 6 characters.";
        }

        this.setState({ password: newValue, passwordError: error });
    }

    // Confirm password — must match
    handleConfirm(event) {
        const newValue = event.target.value;
        let error = "";

        if (!newValue) {
            error = "Please confirm your password.";
        } else if (newValue !== this.state.password) {
            error = "Passwords do not match.";
        }

        this.setState({ confirmPassword: newValue, confirmError: error });
    }

    // Submit — send to register.php
    handleSubmit(event) {
        event.preventDefault();

        const { nameError, phoneError, emailError, passwordError, confirmError,
                name, phone, email, password } = this.state;

        // Check for any errors or empty fields
        if (nameError || phoneError || emailError || passwordError || confirmError) {
            alert("Please fix the errors before submitting.");
            return;
        }

        if (!name || !phone || !email || !password) {
            alert("Please fill in all fields.");
            return;
        }

        // Send to register via fetch 
        const formData = new FormData();
        formData.append('name', name);
        formData.append('phone', phone);
        formData.append('email', email);
        formData.append('password', password);

        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status) {
                // Redirect to login on success
                window.location.href = 'session.php?registered=1';
            } else {
                alert(data.message);
            }
        })
        .catch(() => {
            alert('Something went wrong. Please try again.');
        });
    }

    // registration form with prompts
    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <div class="logincontainer">
                    <label>Full Name:</label>
                    <input
                        type="text"
                        value={this.state.name}
                        onChange={this.handleName}
                        placeholder="e.g. John Smith"
                    />
                    <p style={{color: "red"}}>{this.state.nameError}</p>

                    <label>Phone Number:</label>
                    <input
                        type="text"
                        value={this.state.phone}
                        onChange={this.handlePhone}
                        placeholder="10 digits e.g. 0712345678"
                        maxLength="10"
                    />
                    <p style={{color: "red"}}>{this.state.phoneError}</p>

                    <label>Email Address:</label>
                    <input
                        type="text"
                        value={this.state.email}
                        onChange={this.handleEmail}
                        placeholder="e.g. abc@xyz.com"
                    />
                    <p style={{color: "red"}}>{this.state.emailError}</p>

                    <label>Password:</label>
                    <input
                        type="password"
                        value={this.state.password}
                        onChange={this.handlePassword}
                        placeholder="At least 6 characters"
                    />
                    <p style={{color: "red"}}>{this.state.passwordError}</p>

                    <label>Confirm Password:</label>
                    <input
                        type="password"
                        value={this.state.confirmPassword}
                        onChange={this.handleConfirm}
                        placeholder="Re-enter your password"
                    />
                    <p style={{color: "red"}}>{this.state.confirmError}</p>

                    <input type="submit" class="sbmtBtn" value="Create Account" />
                </div>

            </form>
        );
    }
}

ReactDOM.render(
    <RegisterForm />,
    document.getElementById('root')
);

</script>

</body>
</html>