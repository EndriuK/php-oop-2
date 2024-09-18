<?php

// Classe Categoria
class Categoria
{
    public $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }
}

// Classe Prodotto
class Prodotto
{
    public $titolo;
    public $prezzo;
    public $immagine;
    public $categoria;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria)
    {
        $this->titolo = $titolo;
        $this->prezzo = $prezzo;
        $this->immagine = $immagine;
        $this->categoria = $categoria;
    }

    public function getDettagli()
    {
        return "Titolo: {$this->titolo}, Prezzo: {$this->prezzo}€, Categoria: {$this->categoria->nome}";
    }
}


// Classe Cibo
class Cibo extends Prodotto
{
    public $tipoCibo;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria, $tipoCibo)
    {
        parent::__construct($titolo, $prezzo, $immagine, $categoria);
        $this->tipoCibo = $tipoCibo;
    }

    public function getDettagli()
    {
        return parent::getDettagli() . ", Tipo di Cibo: {$this->tipoCibo}";
    }
}

// Classe Gioco
class Gioco extends Prodotto
{
    public $materiale;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria, $materiale)
    {
        parent::__construct($titolo, $prezzo, $immagine, $categoria);
        $this->materiale = $materiale;
    }

    public function getDettagli()
    {
        return parent::getDettagli() . ", Materiale: {$this->materiale}";
    }
}

// Classe Cuccia
class Cuccia extends Prodotto
{
    public $dimensioni;

    public function __construct($titolo, $prezzo, $immagine, Categoria $categoria, $dimensioni)
    {
        parent::__construct($titolo, $prezzo, $immagine, $categoria);
        $this->dimensioni = $dimensioni;
    }

    public function getDettagli()
    {
        return parent::getDettagli() . ", Dimensioni: {$this->dimensioni}";
    }
}

// Creazione di categorie
$categoriaCani = new Categoria("Cani");
$categoriaGatti = new Categoria("Gatti");

// Creazione di prodotti
$ciboCani = new Cibo("Cibo per cani", 19.99, "cibo_cani.jpg", $categoriaCani, "Secco");
$giocoGatti = new Gioco("Gioco per gatti", 9.99, "gioco_gatti.jpg", $categoriaGatti, "Plastica");
$cucciaCani = new Cuccia("Cuccia per cani", 49.99, "cuccia_cani.jpg", $categoriaCani, "Grande");

// Visualizzazione dei dettagli dei prodotti
echo "<h1>Dettagli dei prodotti:</h1>";
echo "<pre>";
var_dump($ciboCani->getDettagli());
var_dump($giocoGatti->getDettagli());
var_dump($cucciaCani->getDettagli());
echo "</pre>";

// Array di prodotti
$prodotti = [
    new Cibo("Cibo per cani", 19.99, "cibo_cani.jpg", $categoriaCani, "Secco"),
    new Gioco("Gioco per gatti", 9.99, "gioco_gatti.jpg", $categoriaGatti, "Plastica"),
    new Cuccia("Cuccia per cani", 49.99, "cuccia_cani.jpg", $categoriaCani, "Grande")
];

// Visualizzazione card dei prodotti
echo "<h1>Lista Prodotti</h1>";
foreach ($prodotti as $prodotto) {
    echo "<div class='card'>";
    echo "<img src='{$prodotto->immagine}' alt='{$prodotto->titolo}' style='width:150px;'>";
    echo "<h2>{$prodotto->titolo}</h2>";
    echo "<p>Prezzo: {$prodotto->prezzo}€</p>";
    echo "<p>Categoria: {$prodotto->categoria->nome}</p>";
    echo "<p>{$prodotto->getDettagli()}</p>";
    echo "</div><br>";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

</body>

</html>