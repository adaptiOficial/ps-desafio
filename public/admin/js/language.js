var portugueseDatatable = {
    processing: "Aguarde enquanto os dados são carregados ...",
    lengthMenu: "Mostrar _MENU_ registros por página",
    zeroRecords: "Nenhum registro correspondente ao critério encontrado",
    infoEmtpy: "",
    info: "Exibindo de _START_ a _END_ de _TOTAL_ registros",
    infoFiltered: "",
    search: "Procurar",
    paginate: {
        first: "Primeiro",
        previous: "Anterior",
        next: "Próximo",
        last: "Último",
    },
};

function getTableLang() {
    switch ($("html").attr("lang")) {
        case "pt-BR":
            return portugueseDatatable;

        //English
        default:
            break;
    }
}
