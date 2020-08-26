import "./bootstrap";
import Vue from "vue";
import BreweryLike from "./components/BreweryLike";

const app = new Vue({
    el: "#app",
    components: {
        BreweryLike,
    },
});
