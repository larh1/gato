// Game
const Game = r => require.ensure([],() => r(require("../components/Game/GameComponent.vue")),'game')
const Start = r => require.ensure([],() => r(require("../components/Game/StartComponent.vue")),'game')
// About
const About = r => require.ensure([],() => r(require("../components/About/AboutComponent.vue")),'about')
// 404
const NotFound = r => require.ensure([],() => r(require("../components/Shared/NotFound.vue")),'error')
export const routes = [
    {
        name: "home",
        path: "/",
        component: Start,
    },{
        name: "start",
        path: "/start",
        component: Start,
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
    },
    {
        path: "*",
        component: NotFound
    }
];
