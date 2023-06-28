import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SocalSalesComponent } from './socal-sales.component';

describe('SocalSalesComponent', () => {
  let component: SocalSalesComponent;
  let fixture: ComponentFixture<SocalSalesComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [SocalSalesComponent]
    });
    fixture = TestBed.createComponent(SocalSalesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
