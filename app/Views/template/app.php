<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdaEvent</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="/css/style.css">
    <?= $this->renderSection('css') ?>
</head>

<body>
    <?= $this->include('template/navbar') ?>

    <?= $this->renderSection('konten') ?>

    <?= $this->include('template/footer') ?>

    <?= $this->renderSection('js') ?>
</body>

</html>