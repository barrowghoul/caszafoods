<x-mail::message>
# {{ $vendor->name }}
Caszafoods ha generado una orden de compra para usted. A continuación encontrará los detalles de la orden de compra.
<x-mail::panel>
# Orden: {{ $purchaseOrder->id }}
<x-mail::table>
| Articulo | Unidad | Cantidad | Precio | Total |
| -------------- |:--------------:|:--------------:|:--------------:|--------------:|
@foreach($details as $detail)
| {{ $detail->item->name }} | {{ $detail->item->unit->name }} | {{ $detail->quantity }} | {{ $detail->unit_price }} | {{ $detail->total }} |
@endforeach
| | | | **Subtotal** | **{{ $purchaseOrder->subtotal }}** |
| | | | **IVA** | **{{ $purchaseOrder->tax }}** |
@if($purchaseOrder->ieps > 0)
| | | | **IEPS** | **{{ $purchaseOrder->ieps }}** |
@endif
| | | | **Total** | **{{ $purchaseOrder->total }}** |
</x-mail::table>
</x-mail::panel>
Porfavor no responda a esta dirección de correo, este mailbox es usado solo para enviar correos automáticos.
</x-mail::message>
