$('.tablaHistorico').DataTable({
  responsive: true,

  "language": {
    "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
    "info":		   		"Mostrando del _START_ al _END_ de _TOTAL_ ",
    "infoEmpty":			"Mostrando 0 registros de un total de 0.",
    "infoFiltered":		"(filtrados de un total de _MAX_ registros)",
    "infoPostFix":		"",
    "lengthMenu":			"Mostrar _MENU_ registros",
    "loadingRecords":		"Cargando...",
    "processing":			"Procesando...",
    "search":			    "Buscar:",
    "searchPlaceholder":	"",
    "zeroRecords":		"No se han encontrado coincidencias.",
    "paginate": {
      "first":			"Primera",
      "last":				"Última",
      "next":				"Siguiente",
      "previous":			"Anterior"
    },
    "aria": {
      "sortAscending":	"Ordenación ascendente",
      "sortDescending":	"Ordenación descendente"
    }
  },

  "lengthMenu":		[[10, 20, 25, 50, 100, -1], [10, 20, 25, 50, 100, "Todos"]],
  "iDisplayLength":	10,
});

$('.gestion').DataTable({
  responsive: true,
  
  "language": {
    "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
    "info":		   		"Mostrando del _START_ al _END_ de _TOTAL_ ",
    "infoEmpty":			"Mostrando 0 registros de un total de 0.",
    "infoFiltered":		"(filtrados de un total de _MAX_ registros)",
    "infoPostFix":		"",
    "lengthMenu":			"Mostrar _MENU_ registros",
    "loadingRecords":		"Cargando...",
    "processing":			"Procesando...",
    "search":			    "Buscar:",
    "searchPlaceholder":	"",
    "zeroRecords":		"No se han encontrado coincidencias.",
    "paginate": {
      "first":			"Primera",
      "last":				"Última",
      "next":				"Siguiente",
      "previous":			"Anterior"
    },
    "aria": {
      "sortAscending":	"Ordenación ascendente",
      "sortDescending":	"Ordenación descendente"
    }
  },

  "lengthMenu":		[[10, 20, 25, 50, 100, -1], [10, 20, 25, 50, 100, "Todos"]],
  "iDisplayLength":	10,
});

$('.reservasAct').DataTable({
  responsive: true,
  
  "language": {
    "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
    "info":		   		"Mostrando del _START_ al _END_ de _TOTAL_ ",
    "infoEmpty":			"Mostrando 0 registros de un total de 0.",
    "infoFiltered":		"(filtrados de un total de _MAX_ registros)",
    "infoPostFix":		"",
    "lengthMenu":			"Mostrar _MENU_ registros",
    "loadingRecords":		"Cargando...",
    "processing":			"Procesando...",
    "search":			    "Buscar:",
    "searchPlaceholder":	"",
    "zeroRecords":		"No se han encontrado coincidencias.",
    "paginate": {
      "first":			"Primera",
      "last":				"Última",
      "next":				"Siguiente",
      "previous":			"Anterior"
    },
    "aria": {
      "sortAscending":	"Ordenación ascendente",
      "sortDescending":	"Ordenación descendente"
    }
  },

  "lengthMenu":		[[10, 20, 25, 50, 100, -1], [10, 20, 25, 50, 100, "Todos"]],
  "iDisplayLength":	10,
});

$('.misreservas').DataTable({
  responsive: true,
  
  "language": {
    "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
    "info":		   		"Mostrando del _START_ al _END_ de _TOTAL_ ",
    "infoEmpty":			"Mostrando 0 registros de un total de 0.",
    "infoFiltered":		"(filtrados de un total de _MAX_ registros)",
    "infoPostFix":		"",
    "lengthMenu":			"Mostrar _MENU_ registros",
    "loadingRecords":		"Cargando...",
    "processing":			"Procesando...",
    "search":			    "Buscar:",
    "searchPlaceholder":	"",
    "zeroRecords":		"No se han encontrado coincidencias.",
    "paginate": {
      "first":			"Primera",
      "last":				"Última",
      "next":				"Siguiente",
      "previous":			"Anterior"
    },
    "aria": {
      "sortAscending":	"Ordenación ascendente",
      "sortDescending":	"Ordenación descendente"
    }
  },

  "lengthMenu":		[[10, 20, 25, 50, 100, -1], [10, 20, 25, 50, 100, "Todos"]],
  "iDisplayLength":	10,
});

$('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
  $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
});
