<?php

print '
	<div class="gallery">
		<h1>Gallery</h1>
		<div class="gallery_items">';
		$query  = "SELECT * FROM news";
		$query .= " WHERE archive='N'";
		$query .= " ORDER BY date DESC";
		$result = @mysqli_query($MySQL, $query);
		while($row = @mysqli_fetch_array($result)) {
print '
			<figure>											
				<a href="news/' . $row['picture'] . '" alt="" target="_blank"><img src="news/' . $row['picture'] . '" width="350 alt="' . $row['title'] . '" title="' . $row['title'] . '"></a>
				<figcaption>' . $row['title'] . '</figcaption>
			</figure>';
		}
		foreach (array_filter(glob('gallery/*'), 'is_file') as $file_string){
print'	
			<figure>
				<a href="' . $file_string . '" alt="" target="_blank"><img src="' . $file_string . '" width="350" ></a>
				<figcaption>' . explode('.', explode('/', $file_string)[1])[0] . '</figcaption>
			</figure>';
		}
print'

		</div>
	</div>';

/*
print'
<div class="gallery">
	<h1>Gallery</h1>
	<div>';
		foreach (array_filter(glob('weather/*'), 'is_file') as $file_string){
print'	
		<a href="' . $file_string . '" alt="" target="_blank"><img src="' . $file_string . '" width="350" ></a>
		<figcaption>' . explode('.', explode('/', $file_string)[1])[0] . '</figcaption>
		';
		}
print'
	</div>
</div>
';*/



/*
print '
		<div class="gallery" >
			<h1>Gallery</h1>
			<figure>
			<a href="gallery/holandska kuća.png" alt="" target="_blank"><img src="gallery/holandska kuća.png" width="350" height="257"></a>
			<figcaption>Holandska kuća (Dutch house)</figcaption>
			</figure>
			<figure>
			<a href="gallery/iskopine.png" alt="" target="_blank"><img src="gallery/iskopine.png" width="350" height="257"></a>
			<figcaption>Iskopine Siscie (Excavations of Siscia)</figcaption>
			</figure>
			<figure>
			<a href="gallery/stari grad1.png" alt="" target="_blank"><img src="gallery/stari grad1.png" width="350" height="257"></a>
			<figcaption>Stari grad (Old town)</figcaption>
			</figure>
			<figure>
			<a href="gallery/stari most.png" alt="" target="_blank"><img src="gallery/stari most.png" width="350" height="257"></a>
			<figcaption>Stari most (Old bridge)</figcaption>
			</figure>
			<figure>
			<a href="gallery/šetnica.png" alt="" target="_blank"><img src="gallery/šetnica.png" width="350" height="257"></a>
			<figcaption>Šetnica (Walking trail)</figcaption>
			</figure>
		</div>';*/
?>