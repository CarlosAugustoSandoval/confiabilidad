<template>
    <v-layout>
        <v-expansion-panel v-if="result && result.data">
            <v-expansion-panel-content>
                <template slot="header">
                    <v-layout row wrap>
                        <v-flex xs12>
                            <span class="subheading">{{result.sistema.nombre}} - Tag:{{result.sistema.tag}}</span>
                        </v-flex>
                        <v-layout row justify-space-between class="px-2">
                            <span class="body-2">Disponibilidad: {{result.data.disponibilidad}}</span>
                            <span class="body-2" v-if="result.data.mtbf">MTBF: {{result.data.mtbf.horas}}H:{{result.data.mtbf.minutos}}M</span>
                            <span class="body-2" v-if="result.data.mttr">MTTR: {{result.data.mttr.horas}}H:{{result.data.mttr.minutos}}M</span>
                        </v-layout>
                    </v-layout>
                </template>
                <v-divider></v-divider>
                <v-card>
                    <v-card-title v-if="!delegado"><strong>Tiempo intervalo: {{result.data.intervalo.total_horas}}Horas</strong></v-card-title>
                    <v-card-text :class="delegado ? '' : 'pt-0'">
                        <template v-for="(resultEquipo, index) in result.data.registros">
                            <result-equipo
                                delegado
                                :result="resultEquipo"
                                :key="'resultEquipo' + index"
                            ></result-equipo>
                            <v-divider v-if="index < (result.data.registros.length - 1)"></v-divider>
                        </template>
                    </v-card-text>
                </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>
        <v-flex xs12 v-else>
            <div class="title text-xs-center grey--text" >El sistema no tiene equipos relacionados.</div>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        name: 'ResultSistema',
        props: {
            result: {
                type: Object,
                default: null
            },
            delegado: {
                type: Boolean,
                default: false
            }
        },
        components: {
            ResultEquipo: resolve => {require(['./ResultEquipo'], resolve)}
        },
        data: () => ({
        })
    }
</script>

<style scoped>

</style>
