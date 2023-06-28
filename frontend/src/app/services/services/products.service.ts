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

  public getProducts(): Observable<any[]> {
    return this.http.get<any[]>(`${this.SERVER_URL}/api/products`);
  }

  public getProductsbyId(): Observable<any[]> {
    return this.http.get<any[]>(`${this.SERVER_URL}/api/products/id`);
  }


  public postProduct(product: any): Observable<any> {
    return this.http.post<any>(`${this.SERVER_URL}/api/products`,product);
  }

  public editProduct(id: any, product: ProductModel): Observable<any> {
    return this.http.put<any>(`${this.SERVER_URL}/api/update/${id}`, product);
  }
  
  public deleteProduct(id: any): Observable<any> {
    return this.http.delete<any>(`${this.SERVER_URL}/api/delete/${id}`);
  }

  public getCategories(): Observable<any[]> {
    return this.http.get<any[]>(`${this.SERVER_URL}/api/categories`);
  }

  public getCart(): Observable<any[]> {
    return this.http.get<any[]>(`${this.SERVER_URL}/api/cart`);
  }
  public postCart(product: any): Observable<any> {
    return this.http.post<any>(`${this.SERVER_URL}/api/cart`,product);
  }
  public deleteCart(id: any): Observable<any> {
    return this.http.delete<any>(`${this.SERVER_URL}/api/cart/${id}`);
  }
  public editCart(id: any, product: ProductModel): Observable<any> {
    return this.http.put<any>(`${this.SERVER_URL}/api/cartupdate/${id}`, product);
  }
  
  
}