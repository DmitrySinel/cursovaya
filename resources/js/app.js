import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import MainComponent from './components/MainComponent.vue';
app.component('main-component', MainComponent);

import HeaderComponent from './components/header/HeaderComponent.vue';
app.component('header-component', HeaderComponent);

import WordTestComponent from './components/wordtest/WordTestComponent.vue';
app.component('word-test', WordTestComponent);

app.mount('#app');
