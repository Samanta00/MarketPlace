import { Component, ElementRef, ViewChild } from '@angular/core';
import { Router } from '@angular/router';


@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent {
  @ViewChild('scrollTarget', { static: true }) scrollTarget!: ElementRef;

  constructor(private router: Router) {}

  scrollToText() {
    this.scrollTarget.nativeElement.scrollIntoView({ behavior: 'smooth' });
  }

  sendWhatsAppMessage() {
    const phoneNumber = '55(81)981311245';
    const message = 'Olá, estou entrando em Pois estou muito(a) interessado(a) em conversar sobre as ofertas do MarketPlace Bonanza.';
    
    const url = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${encodeURIComponent(message)}`;
    
    window.open(url, '_blank')
  }
  
}
