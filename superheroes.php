<?php
header("Access-Control-Allow-Origin: *");

// Define superheroes as an array of associative arrays
$superheroes = [
  ["name" => "Captain America", "alias" => "Steve Rogers", "biography" => "Super soldier and leader of the Avengers."],
  ["name" => "Ironman", "alias" => "Tony Stark", "biography" => "Genius billionaire inventor in a metal suit."],
  ["name" => "Spiderman", "alias" => "Peter Parker", "biography" => "Teenager with spider-like abilities."],
  ["name" => "Captain Marvel", "alias" => "Carol Danvers", "biography" => "Powerful cosmic hero with photon blasts."],
  ["name" => "Black Widow", "alias" => "Natasha Romanoff", "biography" => "Expert spy and skilled martial artist."],
  ["name" => "Hulk", "alias" => "Bruce Banner", "biography" => "Scientist who transforms into a green powerhouse."],
  ["name" => "Hawkeye", "alias" => "Clint Barton", "biography" => "Master archer with unmatched accuracy."],
  ["name" => "Black Panther", "alias" => "T'Challa", "biography" => "King of Wakanda with enhanced strength."],
  ["name" => "Thor", "alias" => "Thor Odinson", "biography" => "Norse God of Thunder who wields Mjolnir."],
  ["name" => "Scarlett Witch", "alias" => "Wanda Maximoff", "biography" => "Reality-bending Avenger with chaos magic."]
];

// Check if a query is passed
$query = isset($_GET['query']) ? trim($_GET['query']) : "";

// If no query → show all heroes in a list
if ($query === "") {
  echo "<ul>";
  foreach ($superheroes as $hero) {
    echo "<li>{$hero['name']}</li>";
  }
  echo "</ul>";
  exit;
}

// Otherwise → search for a match (by name or alias)
$found = null;
foreach ($superheroes as $hero) {
  if (strcasecmp($hero['name'], $query) == 0 || strcasecmp($hero['alias'], $query) == 0) {
    $found = $hero;
    break;
  }
}

// Output result
if ($found) {
  echo "<h3>{$found['name']}</h3>";
  echo "<h4>A.K.A {$found['alias']}</h4>";
  echo "<p>{$found['biography']}</p>";
} else {
  echo "<p>Superhero not found</p>";
}
?>
