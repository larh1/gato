// Game
const Game = r => require.ensure([],() => r(require("../components/GameComponent.vue")),'game')
// About
const About = r => require.ensure([],() => r(require("../components/AboutComponent.vue")),'about')

export const routes = [
    {
        name: "home",
        path: "/",
        component: Game,
    },
    {
        name: "game",
        path: "/game",
        component: Game,
    },
    {
        name: "about",
        path: "/about",
        component: About,
    }
];
