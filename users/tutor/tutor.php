<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Group Training Association</title>
	<style>
		 body {
			overflow-x: hidden !important;
			}
	</style>
</head>
<!---- HEAD ---->
<!---- HEAD ---->
<body>

<!---- NAV ---->
<?php include '../include/navbar.php'; ?>
<!---- NAV ---->
<div class="container">
    <section class="py-5 header">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-3"><a href="manage-users.php" class="btn btn-primary" >Manage Students</a></div>
                <div class="col-md-3"><a href="view-groups.php" class="btn btn-secondary" >Manage Groups</a></div>
                <div class="col-md-3"><a href="email.php" class="btn btn-secondary" style="padding: 0.5rem 2rem;">Email</a></div>
            </div>
            <span>
				<?php if(isset($_GET['msg'])) { ?>
                    <div class="alert alert-success alert-dismissible mt-4 mb-2 fade show" role="alert">
					<strong>Message!</strong> <?php echo $_GET['msg']; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                <?php } ?>

				</span>
            <div class="row mt-4">


                <table class="table m-5 rounded bg-light shadow-lg" id="id" id="group_id" id="course" id="name" class="table table-striped" style="width:100%">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col" data-searchable="false">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Email</th>
                        <th scope="col">Group</th>
                        <th scope="col" class="text-center">Attendance</th>
                        
                    </tr>
                    </thead>
                   <tbody>
                    
                                <a href="add-attendance3.php?id=<?php echo $row['id']; ?>" style="color:black;">Mark Attendance <img style="height:20px; width:1;"src="data:image/svg+xml;base64,PHN2ZyBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGwtcnVsZT0iZXZlbm9kZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgc3Ryb2tlLW1pdGVybGltaXQ9IjIiIHZpZXdCb3g9IjAgMCAyNCAyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtMTIuMDAyIDJjNS41MTggMCA5Ljk5OCA0LjQ4IDkuOTk4IDkuOTk4IDAgNS41MTctNC40OCA5Ljk5Ny05Ljk5OCA5Ljk5Ny01LjUxNyAwLTkuOTk3LTQuNDgtOS45OTctOS45OTcgMC01LjUxOCA0LjQ4LTkuOTk4IDkuOTk3LTkuOTk4em0wIDEuNWMtNC42OSAwLTguNDk3IDMuODA4LTguNDk3IDguNDk4czMuODA3IDguNDk3IDguNDk3IDguNDk3IDguNDk4LTMuODA3IDguNDk4LTguNDk3LTMuODA4LTguNDk4LTguNDk4LTguNDk4em0tLjc0NyA3Ljc1aC0zLjVjLS40MTQgMC0uNzUuMzM2LS43NS43NXMuMzM2Ljc1Ljc1Ljc1aDMuNXYzLjVjMCAuNDE0LjMzNi43NS43NS43NXMuNzUtLjMzNi43NS0uNzV2LTMuNWgzLjVjLjQxNCAwIC43NS0uMzM2Ljc1LS43NXMtLjMzNi0uNzUtLjc1LS43NWgtMy41di0zLjVjMC0uNDE0LS4zMzYtLjc1LS43NS0uNzVzLS43NS4zMzYtLjc1Ljc1eiIgZmlsbC1ydWxlPSJub256ZXJvIi8+PC9zdmc+"></path>
							</svg></a><br>
                                <a href="view-attendance3.php?id=<?php echo $row['id'];?>" style="color:black;">View Attendance <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg></a><br>
								<a href="edit-group.php?id=<?php echo $row['id']; ?>" style="color:black;">Change Group <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
							<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
							</svg></a><br>
							</td>
								</tr>
                
                    </tbody>
                </table>
            </div>
            <p></p>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#id').DataTable();
    });
</script>

<!---- FOOTER ---->
<?php include '../include/footer.php'; ?>
<!---- FOOTER ---->
</body>
</html>
