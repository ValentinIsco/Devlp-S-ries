<?php require "header.php" ?>
<!-- 
  Div associée à l'application home de VueJS
 -->
<div id="home">

  <nav>
    <div class="nav-wrapper teal lighten-2">
      <form>
        <div class="input-field">
          <!-- 
            @keyup: a chaque saisie appel la fonction axios
           -->
          <input
            id="title"
            type="search"
            placeholder="Chercher une série"
            autocomplete="off"
            v-model="title"
            @keyup="axios()"
          />
          <label class="label-icon" for="title"
            ><i class="material-icons">search</i></label
          >
        </div>
      </form>
    </div>
  </nav>
  <!-- 
    v-for: boucle le tableau show
    v-if: si la série contient une image et que sa date de création est différente de 0 alors affiche la série
   -->
  <ul
    class="collection"
    v-for="show in list"
    v-if="show.images.poster != null && show.creation != 0"
  >
  <!-- 
    v-bind:href: envoi l'id avec la méthode GET (Exemple: https://nomdedomaine/?search=1)
   -->
    <a class="collection-item row" v-bind:href="'?search=' + show.id">
      <img
        class="responsive-img col l1 s3"
        v-bind:src="show.images.poster"
        v-bind:alt="show.title"
      />
      <h1 class="center-align flow-text col l10 s8">{{show.title}}</h1>
      <span class="col l1 s1">{{show.creation}}</span>
    </a>
  </ul>
  
  <p class="flow-text white-text center-align">
    Trouver sur quelle plateforme est disponible votre série
  </p>

</div>

<?php require "footer.php" ?>
