<?php
$connect = mysqli_connect("localhost", "root", "", "salonkopija");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	select t.ime, t.prezime, t.usluga, t.datum, t.brojtelefona, u.email from termin t join user u on t.userid=u.userid
	WHERE t.ime LIKE '%".$search."%'
	OR t.prezime LIKE '%".$search."%' 
	OR t.usluga LIKE '%".$search."%' 
	OR t.brojtelefona LIKE '%".$search."%' 
	OR t.datum LIKE '%".$search."%' 
	OR u.email LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	select*from termin t join user u on t.userid=u.userid";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Ime</th>
							<th>Prezime</th>
							<th>Usluga</th>
                            <th>Datum</th>
							<th>Broj telefona</th>
							<th>email</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["ime"].'</td>
				<td>'.$row["prezime"].'</td>
				<td>'.$row["usluga"].'</td>
				<td>'.$row["datum"].'</td>
				<td>'.$row["brojtelefona"].'</td>
				<td>'.$row["email"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Nema rezultata';
}
?>