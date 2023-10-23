<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>
<body>
<?= $this->include('navbar') ?>
<div class="container">
	<table class="table caption-top">
		<caption>List of users</caption>
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nama</th>
				<th scope="col">NPM</th>
				<th scope="col">Prodi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($mahasiswa as $m) : ?>
				<tr>
					<th scope="row"><?= $no++; ?></th>
					<td><?= $m["nama"]; ?></td>
					<td><?= $m["npm"]; ?></td>
					<td><?= $m["prodi"]; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<div class="container">
    <div class="info">
		<table class="table table-bordered">
			<tr>
				<td colspan="2" class="text-start">
					<button class="btn btn-primary" onclick="changeName()">Change Name</button>
				</td>
            </tr>
            <tr>
                <td id="nameCellLabel"><h3>Nama:</h3></td>
                <td id="nameCellValue"><h3><?= $name ?></h3></td>
            </tr>
			<tr>
				<td>NPM:</td>
				<td><?= $npm ?></td>
			</tr>
			<tr>
				<td>Matkul:</td>
				<td><?= $class ?></td>
			</tr>
			<tr>
				<td>No. HP:</td>
				<td><?= $phone ?></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><?= $email ?></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><?= $username ?>
					<a href="https://github.com/raditya2010631170111" target="_blank" class="btn btn-secondary">
						<i class="fab fa-github"></i> GitHub Profile
					</a>
				</td>
			</tr>
		</table>
    </div>
</div>

<script>
    function changeName() {
        var nameCellLabel = document.getElementById("nameCellLabel");
        var nameCellValue = document.getElementById("nameCellValue");
        var classCell = document.getElementById("classCell");
        
        var newNameLabel = "Nickname:";
        var newNameValue = "<?= $nickname ?>"; 
        var newClass = "New Class";
        
        if (nameCellLabel.innerHTML.includes("Nama:")) {
            nameCellLabel.innerHTML = "<h3>" + newNameLabel + "</h3>";
            nameCellValue.innerHTML = "<h3>" + newNameValue + "</h3>";
            classCell.innerText = newClass;
        } else {
            nameCellLabel.innerHTML = "<h3>Nama:</h3>";
            nameCellValue.innerHTML = "<h3><?= $name ?></h3>";
            classCell.innerText = $class;
        }
    }
</script>

</body>
</html>
