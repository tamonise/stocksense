package tech.buildrun.stocksense.entity;

import jakarta.persistence.*;

import javax.xml.crypto.Data;
import java.util.UUID;

@Entity
@Table(name="tb_compra")
public class Compra {
    @Id
    @GeneratedValue(strategy = GenerationType.UUID)
    private UUID compraId;

    @Column(name = "data")
    private Data data;

    @Column(name = "forma_de_pagamento")
    private String forma_de_pagamento;

    @Column(name = "quantidade")
    private double quantidade;

    @Column(name = "total")
    private double total;

    public Compra(UUID compraId, Data data, String forma_de_pagamento, double quantidade, double total) {
        this.compraId = compraId;
        this.data = data;
        this.forma_de_pagamento = forma_de_pagamento;
        this.quantidade = quantidade;
        this.total = total;
    }

    public Compra() {
    }

    public UUID getCompraId() {
        return compraId;
    }

    public void setCompraId(UUID compraId) {
        this.compraId = compraId;
    }

    public Data getData() {
        return data;
    }

    public void setData(Data data) {
        this.data = data;
    }

    public String getForma_de_pagamento() {
        return forma_de_pagamento;
    }

    public void setForma_de_pagamento(String forma_de_pagamento) {
        this.forma_de_pagamento = forma_de_pagamento;
    }

    public double getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(double quantidade) {
        this.quantidade = quantidade;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }
}
