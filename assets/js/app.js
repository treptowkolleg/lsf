import Reveal from '../../node_modules/reveal.js/dist/reveal.esm.js';
import Markdown from '../../node_modules/reveal.js/plugin/markdown/markdown.esm.js';
import * as RevealMath from "../../node_modules/reveal.js/plugin/math/katex.js";
import "../../node_modules/reveal.js/plugin//highlight/highlight.js";

let deck = new Reveal({
    plugins: [RevealHighlight,Markdown,RevealMath.KaTeX],
});
deck.initialize();