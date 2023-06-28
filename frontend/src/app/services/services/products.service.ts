import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { ProductModel } from 'src/app/template/cart/cart.model';

@Injectable({
  providedIn: 'root'
})
export class ProductsService {
  SERVER_URL = 'http://localhost:8000';

  constructor(private http: HttpClient) { }

  //rota para visualizar lista de produtos de estoque pelo supermercado
  public getProducts(): Observable<any[]> {
    return this.http.get<any[]>(`${this.SERVER_URL}/api/products`);
  }

 //rota para visualizar categooria
  public getCategories(): Observable<any[]> {
    return this.http.get<any[]>(`${this.SERVER_URL}/api/categories`);
  }

  //rota para visualizar cart
  public getCart(): Observable<any[]> {
    return this.http.get<any[]>(`${this.SERVER_URL}/api/cart`);
  }

  //rota para adicionar valores a cart
  public postCart(product: any): Observable<any> {
    return this.http.post<any>(`${this.SERVER_URL}/api/cart`,product);
  }

  //rotas para deleter valores a cart
  public deleteCart(id: any): Observable<any> {
    return this.http.delete<any>(`${this.SERVER_URL}/api/cart/${id}`);
  }

  //rotas para editar valores a cart
  public editCart(id: any, product: ProductModel): Observable<any> {
    return this.http.put<any>(`${this.SERVER_URL}/api/cartupdate/${id}`, product);
  }
  
  
}