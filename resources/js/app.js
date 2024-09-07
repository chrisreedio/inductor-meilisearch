import './bootstrap'
import '/vendor/chrisreedio/inductor/resources/js/inductor'

import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

$inductor.addComponentPath(import.meta.glob('./components/**/*.vue'))
// Build a pinia instance
$inductor.addPlugin(pinia)
