<template>
    <h1 class="tw-text-white">Le truc de Cyril</h1>

    <div id="map" class="tw-h-[80vh] tw-w-full">
    </div>
</template>

<script setup>
import json from '@pages/../../source-json/minify.json'
import L from 'leaflet'
import "leaflet/dist/leaflet.css"
import * as snake from "@pages/../plugins/snake"
import {onMounted, ref} from "vue";

const mapInstances = ref([]);

onMounted(() => {
    init();
});

function init() {
    L.Map.addInitHook(function () {
        mapInstances.value = [this];
    });

    let latlngs = [[46.2760631, 2.3847375], [46.0694671, 2.2059262]];
    let len = json.length;

    for (let i = 0; i < len; i++) {
        latlngs.push(new L.LatLng(json[i]["lat"], json[i]["lon"]));
    }

    let line = L.polyline(latlngs, {snakingSpeed: 800});

    const map = new L.Map("map");

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
            maxZoom: 19,
            attribution: '&copy; <a target="_blank" href="https://osm.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    map.fitBounds(L.latLngBounds(latlngs));

    map.addLayer(L.marker(latlngs[0]));
    map.addLayer(L.marker(latlngs[len - 1]));

    map.addLayer(line);

    line.snakeIn();
}
</script>

<style scoped>

</style>
