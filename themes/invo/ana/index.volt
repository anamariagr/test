<div class="row mb-3">
    <div class="col-xs-12 col-md-6">
        <h2>Index</h2>
    </div>
    <div class="col-xs-12 col-md-6 text-right">
        {{ link_to("ana/new", "Create Ana", "class": "btn btn-primary") }}
    </div>
</div>

<table class="table">
    <tr>
        <td>id</td>
        <td>description</td>
        <td>price</td>
        <td>Actions</td>
    </tr>
    
         {% for element in records %}
           <tr>
               <td>{{element["id"]}}</td>
               <td>{{element["description"]}}</td>
               <td>{{element["price"]}}</td>
               <td>
                {{ link_to("ana/edit/" ~ element["id"], '<i class="glyphicon glyphicon-edit"></i> Editar', "class": "btn btn-warning") }}
                {{ link_to("ana/delete/" ~ element["id"], '<i class="glyphicon glyphicon-delete"></i> Borrar', "class": "btn btn-danger") }}

               </td>
           </tr>
        {% endfor %}
   
</table>