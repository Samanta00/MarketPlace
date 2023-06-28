export class ProductModel {
    id?: number;
    product_name: string = '';
    category_id: number = 0;
    product_price: number = 0;
    expiration_date: Date = new Date();
    stock_quantity: number = 0;
    perishable_product: boolean = false;
  }
  