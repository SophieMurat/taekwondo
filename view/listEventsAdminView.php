<?php ob_start(); ?>

<div class="container mt-3">
    <div class="row justify-content-center">
      <a class="btn btn-success" href="createEvent" role="button">Créer un nouvel évènement</a>
    </div>
    <div class="row jumbotron text-center">
      <h2 class="col-lg-12 mb-3"><u>Liste des évènements</u></h2>
      <table class="table table-hover text-center" id="events_table">
        <thead class="text-info">
        <tr class="text-center">
            <th>Titre de l'évènement</th>
            <th><i class="far fa-calendar-alt mr-1"></i>Date</th>
            <th>Modifier ou supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($data = $events->fetch()):
        ?>
        <tr>
          <td class="non_responsive"><?php echo htmlspecialchars($data->getTitle()) ?></td>
          <td class="non_responsive"><?php echo $data->getDateEvent() ?></td>
          <td class="non_responsive"><a class="btn btn-info"href="event\<?php echo $data->getId()?>" role="button">Ouvrir</a></td>
          <td class="text-center" id="events_responsive">
            <p class="text-info"><?php echo htmlspecialchars($data->getTitle()) ?></p>
            <p><i class="far fa-calendar-alt mr-1"></i><?php echo $data->getDateEvent() ?></p>
            <a class="btn btn-info"href="event\<?php echo $data->getId()?>" role="button">Ouvrir</a>
          </td>
        </tr>
        <?php
        endwhile;
        $events->closeCursor();
        ?>
        </tbody>
      </table>
    </div>
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>