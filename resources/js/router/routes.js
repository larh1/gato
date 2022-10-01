// About
const About = r => require.ensure([],() => r(require("../components/About/AboutComponent.vue")),'about')
// Game
const GameManager = r => require.ensure([],() => r(require("../components/GameManager.vue")),'game')
// 404
const NotFound = r => require.ensure([],() => r(require("../components/Shared/NotFound.vue")),'error')
export const routes = [
    {
        name: "home",
        path: "/",
        component: GameManager,
    },
    {
        name: "about",
        path: "/about",
        component: About,
    },
    {
        name: "game",
        path: "/start",
        component: GameManager,
    },
    {
        path: "*",
        component: NotFound
    }
];
