var app = angular.module('ngApp',[])

function TrabajoController($scope, $http)
{
    var IdPersona = null
    CargarTrabajoalumno()

    function BuscarAlumno(IdPersona)
    {
        var alumno = {IdPersona:'',NombreCompleto:'',Carnet:'',Sexo:'',Carrera:''}

        angular.forEach($scope.alumnos, function(value, key){
            if (value.IdPersona == IdPersona)
            {
                alumno.IdPersona = IdPersona,
                    alumno.NombreCompleto = value.NombreCompleto,
                    alumno.Carnet = value.Carnet,
                    alumno.Sexo = value.Sexo,
                    alumno.Carrera = value.Carrera
            }
        })
        return alumno
    }

    function CargarTrabajoalumno()
    {
        oldDetalle = $scope.Trabajoalumno
        $scope.Trabajoalumno = []

        angular.forEach(oldDetalle,function (value, key) {

            $scope.Trabajoalumno.push(BuscarAlumno(value.IdPersona))
        })
    }

    $scope.add = function()
    {
        var bandera = false
        var NombreCompleto = $('#select2-IdPersona-container').text()

        angular.forEach($scope.Trabajoalumno,function (value, key) {
            if(value.IdPersona == IdPersona)
            {
                alertify.error('El alumno ya existe en la lista')
                bandera = true
            }
        })

        if (IdPersona == null)
        {
            alertify.error('Debe seleccionar un alumno de la lista')
        }
        else if (!bandera)
        {
            var alumno = {
                IdPersona:IdPersona,
                NombreCompleto:NombreCompleto,
                Carnet:$scope.Carnet,
                Sexo:$scope.Sexo,
                Carrera:$scope.Carrera
            }

            $scope.Trabajoalumno.push(alumno)
        }
    }

    $scope.del = function(index){
        $scope.Trabajoalumno.splice(index, 1)
    }

    $scope.SetAlumno = function()
    {
        IdPersona = $scope.IdPersona
        $http({
            method : 'GET',
            url : 'datos-alumno',
            params: {IdPersona:IdPersona},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        }).then(function OnSuccess(response) {
            if(response.data.length == 0)
                alertify.success('No hay informacion para mostrar')
            else {
                $scope.IdPersona = response.data.IdPersona,
                    $scope.NombreCompleto = response.data.NombreCompleto,
                    $scope.Carnet = response.data.Carnet,
                    $scope.Sexo = response.data.Sexo,
                    $scope.Carrera = response.data.Carrera
            }
        }, function OnError(response) {
            console.log(response.data)
        })
    }

}


function EvaluacionController($scope, $http)
{
    var IdParametro = null
    CargarIdParametros()

    function BuscarAlumno(IdPersona)
    {
        var alumno = {IdPersona:'',NombreCompleto:'',Carnet:'',Sexo:'',Carrera:''}

        angular.forEach($scope.alumnos, function(value, key){
            if (value.IdPersona == IdPersona)
            {
                alumno.IdPersona = IdPersona,
                    alumno.NombreCompleto = value.NombreCompleto,
                    alumno.Carnet = value.Carnet,
                    alumno.Sexo = value.Sexo,
                    alumno.Carrera = value.Carrera
            }
        })
        return alumno
    }

    function CargarIdParametros()
    {
        oldDetalle = $scope.IdParametros
        $scope.IdParametros = []

        angular.forEach(oldDetalle,function (value, key) {

            $scope.IdParametros.push(BuscarAlumno(value.IdPersona))
        })
    }

    $scope.SetAlumno = function()
    {
        IdParametro = $scope.IdParametro
        $http({
            method : 'GET',
            url : 'datos-parametros',
            params: {IdParametro:IdParametro},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        }).then(function OnSuccess(response) {
            if(response.data.length == 0)
                alertify.success('No hay informacion para mostrar')
            else {
                $scope.IdParametro = response.data.IdParametro
            }
        }, function OnError(response) {
            console.log(response.data)
        })
    }

}
app.controller('TrabajoController', TrabajoController)
app.controller('EvaluacionController', EvaluacionController)
