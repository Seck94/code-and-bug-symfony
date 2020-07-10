//     $(document).ready(function(){

      
//         let offset = 0;
//         const tbody = $('#tbody');
//         $.ajax({
//                 type: "POST",
//                 url: "/etudiant/listeetudiant",
//                 data: {limit:2,offset:offset},
//                 dataType: "JSON",
//                 success: function (data) {
// for (let i = 0; i < data.length; i++) {
//     console.log(data[i]);
    
//     // var tr=document.createElement('tr');
//     // var td=document.createElement('td');
//     // data[i].nom
//     // data[i].nom
    
// }
                    
//                 }
//             });

//             //  Scroll
//         const scrollZone = $('#scrollZone')
//         scrollZone.scroll(function(){
//         //console.log(scrollZone[0].clientHeight)
//         const st = scrollZone[0].scrollTop;
//         const sh = scrollZone[0].scrollHeight;
//         const ch = scrollZone[0].clientHeight;

//         console.log(st,sh, ch);
        
//         if(sh-st <= ch){
//             $.ajax({
//                 type: "POST",
//                 url: "/etudiant/listeetudiant",
//                 data: {limit:2,offset:offset},
//                 dataType: "JSON",
//                 success: function (data) {
//                     for (let i = 0; i < data.length; i++) {
//                         console.log(data[i]);
//                          var table=document.createElement('table');
//                          var tr=document.createElement('tr');
//                          var td=document.createElement('h5');
//                         td.innerText= data[i].nom
//                         td.innerText= data[i].prenom
//                         td.innerText= data[i].email
//                         td.innerText= data[i].telephone
                        

//                         table.append(tr)
//                         tr.append(td)
//                         $('#scrollZone').append(td)
//                         // data[i].nom
                         
                        
//                     }
                   
//                     offset +=2;
//                 }
//             });
//         }
           
//         })
//     });




$(document).ready(function(){

    
    const tbody = $('#tbody');  
        //search
        $('#btnSearch').click(function () {
        let search = $('#search').val();
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1:8000/etudiant/searchetudiant",
            data: {search:search},
            dataType: "JSON",
            success: function (data) {
                tbody.html('')
                printData(data,tbody);
            }
        });
    });

       
});

function printData(data,tbody){
    $.each(data, function(indice,etudiant){
        tbody.append(`
        <tr class="text-center">
            <td>${etudiant.nom}</td>
            <td>${etudiant.prenom}</td>
            <td>${etudiant.email}</td>
            <td>${etudiant.telephone}</td>
            <td>${etudiant.date}</td>
            <td>${etudiant.action}</td>
        </tr>
    `);
});
}

