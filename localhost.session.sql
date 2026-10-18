SELECT producto.*, proveedor.codigo AS codigo_proveedor, categoria.nombre_categoria
FROM producto
LEFT JOIN proveedor ON proveedor.cif = producto.proveedor
LEFT JOIN categoria ON categoria.id_categoria = producto.id_categoria
