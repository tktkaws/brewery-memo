import "./bootstrap";
import Vue from "vue";
import BreweryLike from "./components/BreweryLike";
import BreweryTagsInput from "./components/BreweryTagsInput";

const app = new Vue({
    el: "#app",
    components: {
        BreweryLike,
        BreweryTagsInput
    }
});
