<?php get_header('Réalisations', 'admin'); ?>
réalisations

<h2>Liste des Réalisations</h2>

<a href="<?= $router->generate('addRealisation'); ?>" class="btn btn-success">Ajouter</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Client</th>
            <th scope="col">Réalisation</th>
            <th scope="col">Catégorie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($realisations as $realisation) { ?>
            <tr>
                <td class="align-middle"><?= $realisation->client; ?></td>
                <td class="align-middle"><?= $realisation->img; ?></td>
                <td class="align-middle"><?= $realisation->categorie_id; ?></td>
                <td class="text-center align-middle">
                    <a class='btn btn-warning'href="<?= $router->generate('editRealisation', ['id' =>  $realisation->id]); ?>">Editer</a>
                    <a class='btn btn-danger'href="<?= $router->generate('deleteRealisation', ['id' =>  $realisation->id]); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>