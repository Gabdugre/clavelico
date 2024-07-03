<?php get_header('Admin services', 'admin'); ?>

réalisations

<h2>Liste des Services</h2>



<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Service</th>
            <th scope="col">Description</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($service as $services) { ?>
            <tr>
                <td class="align-middle"><?= $services->servName; ?></td>
                <td class="align-middle"><?= $services->description; ?></td>
                
                <td class="text-center align-middle">
                    <a class='btn btn-warning'href="<?= $router->generate('editService', ['id' =>  $services->id]); ?>">Editer</a>
                    
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>