import { Component } from '@angular/core';

@Component({
  selector: 'app-socal-sales',
  templateUrl: './socal-sales.component.html',
  styleUrls: ['./socal-sales.component.css']
})
export class SocalSalesComponent {
  senderEmail: string = '';
  subject: string = '';
  message: string = '';

  sendEmail() {
    // Lógica para enviar o email
    const email = {
      senderEmail: this.senderEmail,
      recipientEmail: 'ellen.samanta@outlook.com',
      subject: this.subject,
      message: this.message
    };

    // Aqui você pode implementar a lógica para enviar o email usando um serviço ou biblioteca de email

    // Exemplo de log para verificar os dados antes de enviar o email
    console.log(email);
  }
}
