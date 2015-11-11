{% for pari in listePari %}
<h4> {{ pari.user.prenom }} {{ pari.user.name }}</h4>
<p>{{ pari.user.username }}</p>
<p>{{ pari.mise }}</p>

{% if event.equipegagnante == NULL %}
<p>le match n'est pas terminé !</p>
{% elseif pari.equipeparie == event.equipegagnante %}
<p>Pari gagné !</p>
{% else %}
<p>Pari perdu !</p>
{% endif %}

{% endfor %}