import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//vue

import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ThreeStepForm from './components/ThreeStepForm.vue';
app.component('three-step-form', ThreeStepForm);


app.mount('#app');