/*
Application associée à la div home de la page home.php
 */
new Vue({
  el: "#home",
  /* 
  title: contient la valeur saisie par l'utilisateur
  list: tableau qui contient les séries trouvées et leurs données
  */
  data: {
    title: null,
    list: [],
  },
  /* 
  axios(): appel l'API de BetaSeries (https://www.betaseries.com/api/ key=a6069294d22d) et stock les séries dans le tableau list (Exemple: https://api.betaseries.com/shows/search?key=a6069294d22d&title=Breaking+Bad)
  */
  methods: {
    axios() {
      axios
        .get(
          "https://api.betaseries.com/shows/search?key=a6069294d22d&title=" +
            this.title
        )
        .then((response) => (this.list = response.data.shows))
        .catch((erreur) => alert("Erreur de changement"));
    },
  },
});
/*
Application associée à la div show de la page show.php
 */
new Vue({
  el: "#show",
  /* 
  id: récupère l'id de la série
  show: tableau qui contient les données de la série
  */
  data: {
    id: document.getElementById("search").value,
    show: [],
  },
  /* 
  Appel l'API et stock les données de la série dans le tableau show (Exemple: https://api.betaseries.com/shows/display?key=a6069294d22d&id=1)
  */
  mounted() {
    axios
      .get(
        "https://api.betaseries.com/shows/display?key=a6069294d22d&id=" +
          this.id
      )
      .then((response) => (this.show = response.data.show))
      .catch((erreur) => alert("Erreur de changement"));
  },
});
