<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Minimal PHP Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="py-4">

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <form method="POST" class="row g-3 p-3 rounded bg-light">
        <h1>PHP Form</h1>

        <div class="col-md-6">
          <label class="form-label">First Name</label>
          <input type="text" class="form-control" name="fname" placeholder="Hania" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Last Name</label>
          <input type="text" class="form-control" name="lname" placeholder="Khan" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" placeholder="xyz@gmail.com" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

        <fieldset class="row mb-3 mt-4">
          <legend class="col-form-label pt-0 d-block">Gender</legend>
          <div class="col-sm-6 d-flex gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="Male" checked>
              <label class="form-check-label">Male</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="Female">
              <label class="form-check-label">Female</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="Other">
              <label class="form-check-label">Other</label>
            </div>
          </div>
        </fieldset>

        <div class="col-md-6">
          <label class="form-label">D.O.B</label>
          <input type="date" class="form-control" name="dob">
        </div>

        <div class="col-md-6">
          <label class="form-label">Country</label>
          <select class="form-select" name="country">
            <option value="">Choose...</option>
            <option>Pakistan</option>
            <option>United States</option>
            <option>Germany</option>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">City</label>
          <select class="form-select" name="city">
            <option value="">Choose...</option>
            <option>Karachi</option>
            <option>Lahore</option>
            <option>Islamabad</option>
            <option>London</option>
            <option>New York</option>
          </select>
        </div>

        <div class="col-md-12">
          <label class="form-label d-block">Courses</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="courses[]" value="WPL">
            <label class="form-check-label">WPL</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="courses[]" value="OOP">
            <label class="form-check-label">OOP</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="courses[]" value="OS">
            <label class="form-check-label">OS</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="courses[]" value="Calculus">
            <label class="form-check-label">Calculus</label>
          </div>
        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Add to Table</button>
        </div>
      </form>
    </div>

    <div class="col-md-6">
      <table class="table">
        <thead>
          <tr>
            <th>S.NO</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Country</th>
            <th>City</th>
            <th>Gender</th>
            <th>Courses</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "<tr>";
            echo "<td>1</td>";
            echo "<td>$fname</td>";
            echo "<td>$lname</td>";
            echo "<td>$email</td>";
            echo "<td>$password</td>";
            echo "<td>$gender</td>";
            echo "<td>$dob</td>";
            echo "<td>$country</td>";
            echo "<td>$city</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
