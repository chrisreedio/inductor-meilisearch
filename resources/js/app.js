import './bootstrap'
import '/vendor/chrisreedio/inductor/resources/js/inductor'
import 'primeicons/primeicons.css'

import Aura from '@primevue/themes/aura';
import PrimeVue from 'primevue/config';
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

$inductor.addPlugin(PrimeVue, { theme: { preset: Aura } })

$inductor.addComponentPath(import.meta.glob('./components/**/*.vue'))
// Build a pinia instance
$inductor.addPlugin(pinia)
