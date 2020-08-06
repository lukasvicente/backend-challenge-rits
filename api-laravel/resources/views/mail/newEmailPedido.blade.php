@component('mail::message')
<h1>Status do Pedido</h1>
<h3>Codigo do pedido:   # {{$id}}  </h3>
 
    
    - Cliente: {{$name}}  
    - Status:  {{$status}}  
 
@endcomponent
 