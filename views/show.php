<?php require "header.php" ?>
<!-- 
  Div associée à l'application show de VueJS
 -->
<div id="show">
  <!-- 
    Input qui récupère la valeur de search avec la métode GET
   -->
  <input id="search" type="hidden" value="<?= $_GET[search] ?>" />

  <div class="card">

    <div class="card-image">
      <img v-bind:src="show.images.show" v-bind:alt="show.title" />
      <span class="card-title">{{show.title}} ({{show.creation}})</span>
    </div>

    <div class="card-content row">
      <img
        class="responsive-img col l2 s8 offset-s2"
        v-bind:src="show.images.poster"
        v-bind:alt="show.title"
      />
      <blockquote class="right-align col l3 offset-l7">
        {{show.seasons}} saison(s) - {{show.episodes}} épisode(s) -
        <!-- 
          v-if: si la série est terminée alors afficher "Terminée" sinon afficher "En cours"
         -->
        <span v-if="show.status == 'Ended'">Terminée</span>
        <span v-else>En cours</span>
      </blockquote>
      <p class="flow-text col l10 s12">{{show.description}}</p>
    </div>
    <!-- 
      v-if: si la série est disponible sur une ou plusieurs plateforms alors afficher les plateforms
     -->
    <div class="card-action row" v-if="show.platforms != null">
      <span class="flow-text col l12 s12">Disponible sur:</span>
      <!-- 
        v-for: boucle le tableau platforms de la série
        v-if: si le nom de la plateform est "Canal+ Séries" alors ne l'affiche pas (Canal+ propose Netflix et Disney+ dans leur service, du coup si une série est disponible sur une des deux plateformes "Canal+" sera affiché)
       -->
      <a
        class="col l1 s3"
        v-bind:href="plat.link_url"
        target="_blank"
        v-for="plat in show.platforms.svods"
        v-if="plat.name != 'Canal+ Séries'"
      >
        <img
          class="responsive-img hoverable"
          v-bind:src="plat.logo"
          v-bind:alt="show.title"
        />
      </a>
    </div>

  </div>

</div>

<?php require "footer.php" ?>
