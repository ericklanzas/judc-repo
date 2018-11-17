var app = angular.module('MyApp', []);

function ListadoController($scope, $http)
{
    $scope.ListaCompleta = []
    $scope.CantidadBonos = 0

    findItem = function (id) {
        var items = $scope.ListaCompleta.filter(function (t) {
            return t.Id === Id
        })
        return items[0]
    }
    
    $scope.deleteItem = function (index) {
        $scope.ListaCompleta.splice(index, 1)
        $scope.CantidadBonos = $scope.ListaCompleta.length
    }
    
    $scope.enviar = function (evt) {

        if($scope.ListaCompleta < 1)
        {
            alertify.error('Debe agregar al menos un estudiante a la lista')
            evt.preventDefault()
            evt.stopPropagation()
        }

    }

    $scope.addNew = function (evt) {

        var Id = $('#Id').val()
        var IdEstudiante = $('#IdEstudiante').val()
        var Carnet = $('#Carnet').val()
        var PrimerNombre = $('#PrimerNombre').val()
        var SegundoNombre = $('#SegundoNombre').val()
        var PrimerApellido = $('#PrimerApellido').val()
        var SegundoApellido = $('#SegundoApellido').val()

        if (Id.length == 0)
        {
            alertify.error('Debe seleccionar un numero de carnet distinto')
            return false
        }

        else{
        if ($scope.CantidadBonos != 10)
        {
            var estudiante = {
                    Id:Id,
                    IdEstudiante:IdEstudiante,
                    Carnet:Carnet,
                    PrimerNombre:PrimerNombre,
                    SegundoNombre:SegundoNombre,
                    PrimerApellido:PrimerApellido,
                    SegundoApellido:SegundoApellido,
                }
            $scope.ListaCompleta.push(estudiante)
            $('#Id').val('')
        }

        $scope.CantidadBonos = $scope.ListaCompleta.length
        }
    }
}

function GrupoController($scope, $http) {

        function Enviar(listadobonos, bono) {

        }

        $scope.loadDatos = function (opcion) {
            var config = {
                metod: 'POST',
                url: $scope.url,
                data: $.params({opcion:opcion}),
                headers:{'Content-Type': 'application/x-www-form-urlencoded'},
                cache: $templateCache

            }

            var post = $http(config)
            post
                .success(function (data, status, headers, config) {
                    $scope.text = data
            })
                .error(function (data, status, headers, config) {
                    consol.log("Error: " + data);
                })
        }

        $scope.Cargar = function (IdAnioLectivo, IdSemestre, IdGrupo) {

            listado = $scope.EstudianteBono.map(function (bono) {
                    if ((bono.GrupoId == IdGrupo) && (bono.IdSemestre == IdSemestre) && (bono.IdAnioLectivo == IdAnioLectivo))
                    return {
                        IdGrupo:bono.GrupoId,
                        NumeroSerie:bono.NumeroSerie,
                        Carnet: bono.Carnet,
                        NombreCompleto:bono.NombreCompleto,
                        Bono:bono.TipoBono
                    }
            })

            var listafiltrada = []
            angular.forEach(listado, function (value, key) {
                if(value != null)
                    listafiltrada.push(value)
            })

            $scope.listadobonos = listafiltrada;

        }
}


app.controller('ListadoController', ListadoController);
app.controller('GrupoController', GrupoController);
