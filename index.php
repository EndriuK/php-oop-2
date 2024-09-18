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