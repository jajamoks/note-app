import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";
import NotesCreate from "./views/NotesCreate";
import NotesShow from "./views/NotesShow";
import NotesEdit from "./views/NotesEdit";
import NotesIndex from "./views/NotesIndex";
import Logout from "./Actions/Logout";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/', component: ExampleComponent,
            meta: { title: 'Welcome' }
        }, {
            path: '/notes', component: NotesIndex,
            meta: { title: 'Notes' }
        }, {
            path: '/notes/create', component: NotesCreate,
            meta: { title: 'Add New Note' }
        }, {
            path: '/notes/:id', component: NotesShow,
            meta: { title: 'Details for Note' }
        }, {
            path: '/notes/:id/edit', component: NotesEdit,
            meta: { title: 'Edit Note' }
        }, {
            path: '/logout', component: Logout
        }
    ],
    mode: 'history'
});
